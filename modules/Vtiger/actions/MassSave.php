<?php
/*+***********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 *************************************************************************************/

class Vtiger_MassSave_Action extends Vtiger_Mass_Action {

	function checkPermission(Vtiger_Request $request) {
		$moduleName = $request->getModule();
		$moduleModel = Vtiger_Module_Model::getInstance($moduleName);
		$currentUserPriviligesModel = Users_Privileges_Model::getCurrentUserPrivilegesModel();

		if(!$currentUserPriviligesModel->hasModuleActionPermission($moduleModel->getId(), 'Save')) {
			throw new AppException(vtranslate($moduleName, $moduleName).' '.vtranslate('LBL_NOT_ACCESSIBLE'));
		}

		// Added by Phu Vo on 2020.07.27
		if (isReadonlyModule($moduleName)) {
			throw new AppException(vtranslate('LBL_PERMISSION_DENIED'));
		}
		// End Phu Vo
	}

	public function process(Vtiger_Request $request) {
		$response = new Vtiger_Response();
		try {
			vglobal('VTIGER_TIMESTAMP_NO_CHANGE_MODE', $request->get('_timeStampNoChangeMode',false));
			$moduleName = $request->getModule();
			$moduleModel = Vtiger_Module_Model::getInstance($moduleName);
			$recordModels = $this->getRecordModelsFromRequest($request);
			$allRecordSave= true;

			// Added by Phu Vo on 2023.01.06 to process send notification for mass save
			CPNotifications_QueuedNotification_Helper::setupMassNotifyQueue();
			// End Phu Vo

			foreach($recordModels as $recordId => $recordModel) {
				if(Users_Privileges_Model::isPermitted($moduleName, 'Save', $recordId)) {
					$recordModel->save();
				} else {
					$allRecordSave= false;
				}
			}

			// Added by Phu Vo on 2023.01.06 to process send notification for mass save
			CPNotifications_QueuedNotification_Helper::processQueuedMassNotify();
			// End Phu Vo

			vglobal('VTIGER_TIMESTAMP_NO_CHANGE_MODE', false);
			if($allRecordSave) {
				$response->setResult(true);
			} else {
			   $response->setResult(false);
			}
		} catch (DuplicateException $e) {
			$response->setError($e->getMessage(), $e->getDuplicationMessage(), $e->getMessage());
		} catch (Exception $e) {
			$response->setError($e->getMessage());
		}
		$response->emit();
	}

	/**
	 * Function to get the record model based on the request parameters
	 * @param Vtiger_Request $request
	 * @return Vtiger_Record_Model or Module specific Record Model instance
	 */
	function getRecordModelsFromRequest(Vtiger_Request $request) {

		$moduleName = $request->getModule();
		$moduleModel = Vtiger_Module_Model::getInstance($moduleName);
		$recordIds = $this->getRecordsListFromRequest($request);
		$recordModels = array();

		$fieldModelList = $moduleModel->getFields();
		foreach($recordIds as $recordId) {
			$recordModel = Vtiger_Record_Model::getInstanceById($recordId, $moduleModel);
			$recordModel->set('id', $recordId);
			$recordModel->set('mode', 'edit');

			foreach ($fieldModelList as $fieldName => $fieldModel) {
				$fieldValue = $request->get($fieldName, null);
				$fieldDataType = $fieldModel->getFieldDataType();
				if($fieldDataType == 'time'){
					$fieldValue = Vtiger_Time_UIType::getTimeValueWithSeconds($fieldValue);
				}
				if(isset($fieldValue) && $fieldValue != null) {
					if(!is_array($fieldValue)) {
						$fieldValue = trim($fieldValue);
					}
					$recordModel->set($fieldName, $fieldValue);
				} else {
					$uiType = $fieldModel->get('uitype');
					if($uiType == 70) {
						$recordModel->set($fieldName, $recordModel->get($fieldName));
					}  else {
						$uiTypeModel = $fieldModel->getUITypeModel();
						$recordModel->set($fieldName, $uiTypeModel->getUserRequestValue($recordModel->get($fieldName)));
					}
				}
			}
			$recordModels[$recordId] = $recordModel;
		}
		return $recordModels;
	}
}
