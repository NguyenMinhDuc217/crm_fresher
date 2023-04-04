<?php

/*
	Webhook CMCTelecomConnector
	Author: Hieu Nguyen
	Date: 2018-10-03
	Purpose: to handle request from CMC webhook and forward that request into real-time service
*/

require_once('include/utils/CallCenterUtils.php');

class CMCTelecomConnector extends Vtiger_EntryPoint {

	function process(Vtiger_Request $request) {
		CallCenterUtils::checkConfig();
		
		// Get data from webhook
		$request = CallCenterUtils::getRequest();
		$rawRequest = $request->getAllPurified();
		$event = $request->get('event');
		$data = $request->get('data');

		// Handle skill-based routing
		if ($rawRequest['action'] == 'GetRouting' && !empty($rawRequest['fromPhone'])) {
			$response = PBXManager_CMCTelecom_Connector::handleSkillBasedRouting($rawRequest['fromPhone'], $rawRequest['pbxPhone']);
			CallCenterUtils::saveLog('[CMCTelecom] Skill-Based Routing request', null, $rawRequest, $response);

			header('Content-Type: application/json');
			echo json_encode($response);
			exit;
		}

		CallCenterUtils::saveLog('[CMCTelecom] Webhook data', null, $rawRequest);

		if (count($rawRequest) <= 2) {
			echo 'Listening!';
		}

		// Ignore system signal
		if ($data['caller'] == 'system') {
			exit;
		}

		// Ignore empty caller or receiver signals
		if (empty($data['caller']) || empty($data['destination'])) {
			exit;
		}

		// Added by Phu Vo on 2019.09.25 => Ignore outbound signals from system to ext (caller = destination)
		if ($data['caller'] == $data['destination'] && $data['state'] == 'ringing') {
			exit;
		}
		// End Phu Vo

		// Ignore the duplicated signal when the call center retry a timeout request
		if (PBXManager_CMCTelecom_Connector::isExists($data['uuid'], ($event == 'call-record') ? 'completed' : $data['state'])) {
			exit;
		}

		// Check receiver
		$callId = $data['uuid'];
		$receiverId = '';

		if ($data['state'] == 'ringing') {
			$agentExtNumber = CallCenterUtils::getAgentExtNumber($data['caller'], $data['destination'], $data['direction']);
			$agent = PBXManager_Data_Model::findAgentByExtNumber($agentExtNumber);
			
			if (!empty($agent)) $receiverId = $agent['id'];
		}
		else {
			$receiverId = PBXManager_Data_Model::getAgentUserIdFromCall($callId);
		}

		// Send call event to Call Center Bridge
		if (!empty($receiverId)) {
			if ($event == 'call-record') $data['state'] = 'hangup';

			$msg = [
				'call_id' => $callId,                           // Required
				'receiver_id' => $receiverId,                   // Required (CRM user id)
				'state' => strtoupper($data['state']),          // Must be RINGING/ANSWERED/HANGUP/COMPLETED/CUSTOMER_INFO
			];

			if ($data['state'] == 'ringing') {
				$msg['direction'] = strtoupper($data['direction']); // Must be INBOUND/OUTBOUND
				$msg['hotline'] = $data['pbxnumber'];               // Display hotline number where the call is handled

				$customerPhoneNumber = CallCenterUtils::getCustomerPhoneNumber($data['caller'], $data['destination'], $data['direction']);
				$customer = PBXManager_Data_Model::findCustomerByPhoneNumber($customerPhoneNumber, $data['direction'] == 'outbound', $agentExtNumber, true);
				CallCenterUtils::fillMsgDataForRingingEvent($msg, $customerPhoneNumber, $customer);

				// Register global variable so that it can be reused in handleCallEvent function
				$GLOBALS['agent'] = $agent;
				$GLOBALS['customer'] = $customer;

				// Send related call log id to update this call log instead of creating a new one
				if (!empty($customer['call_log_id'])) {
					$msg['call_log_id'] = $customer['call_log_id'];
				}
			}

			if ($data['state'] == 'hangup' && !empty($data['duration'])) {
				$msg['duration'] = $data['duration'];
			}

			PBXManager_CMCTelecom_Connector::forwardToCallCenterBridge($msg);
			CallCenterUtils::saveDebugLog('[CMCTelecom] Data sent to call popup for ' . $agentExtNumber, null, $msg);
		}

		// Save call history
		if (($data['state'] == 'ringing' && !empty($receiverId)) || $data['state'] != 'ringing') {
			PBXManager_CMCTelecom_Connector::handleCallEvent($data);
		}        
	}
}