<?php
/*+***********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 *************************************************************************************/

class Accounts_Record_Model extends Vtiger_Record_Model {

	/**
	 * Function returns the details of Accounts Hierarchy
	 * @return <Array>
	 */
	function getAccountHierarchy() {
		$focus = CRMEntity::getInstance($this->getModuleName());
		$hierarchy = $focus->getAccountHierarchy($this->getId());
		$i=0;
		foreach($hierarchy['entries'] as $accountId => $accountInfo) {
			preg_match('/<a href="+/', $accountInfo[0], $matches);
			if($matches != null) {
				preg_match('/[.\s]+/', $accountInfo[0], $dashes);
				preg_match("/<a(.*)>(.*)<\/a>/i",$accountInfo[0], $name);

				$recordModel = Vtiger_Record_Model::getCleanInstance('Accounts');
				$recordModel->setId($accountId);
				$hierarchy['entries'][$accountId][0] = $dashes[0]."<a href=".$recordModel->getDetailViewUrl().">".$name[2]."</a>";
			}
		}
		return $hierarchy;
	}

	/**
	 * Function returns the url for create event
	 * @return <String>
	 */
	function getCreateEventUrl() {
		$calendarModuleModel = Vtiger_Module_Model::getInstance('Calendar');
		return $calendarModuleModel->getCreateEventRecordUrl().'&parent_id='.$this->getId();
	}

	/**
	 * Function returns the url for create todo
	 * @retun <String>
	 */
	function getCreateTaskUrl() {
		$calendarModuleModel = Vtiger_Module_Model::getInstance('Calendar');
		return $calendarModuleModel->getCreateTaskRecordUrl().'&parent_id='.$this->getId();
	}

	/**
	 * Function to check duplicate exists or not
	 * @return <boolean>
	 */
	public function checkDuplicate() {
		$db = PearDatabase::getInstance();

		$query = "SELECT 1 FROM vtiger_crmentity WHERE setype = ? AND label = ? AND deleted = 0";
                $params = array($this->getModule()->getName(), decode_html($this->getName())); 

		$record = $this->getId();
		if ($record) {
			$query .= " AND crmid != ?";
			array_push($params, $record);
		}

		$result = $db->pquery($query, $params);
		if ($db->num_rows($result)) {
			return true;
		}
		return false;
	}

	/**
	 * Function to get List of Fields which are related from Accounts to Inventory Record.
	 * @return <array>
	 */
	public function getInventoryMappingFields() {
		return array(
				//Billing Address Fields
				array('parentField'=>'bill_city', 'inventoryField'=>'bill_city', 'defaultValue'=>''),
				array('parentField'=>'bill_street', 'inventoryField'=>'bill_street', 'defaultValue'=>''),
				array('parentField'=>'bill_state', 'inventoryField'=>'bill_state', 'defaultValue'=>''),
				array('parentField'=>'bill_code', 'inventoryField'=>'bill_code', 'defaultValue'=>''),
				array('parentField'=>'bill_country', 'inventoryField'=>'bill_country', 'defaultValue'=>''),
				array('parentField'=>'bill_pobox', 'inventoryField'=>'bill_pobox', 'defaultValue'=>''),

				//Shipping Address Fields
				array('parentField'=>'ship_city', 'inventoryField'=>'ship_city', 'defaultValue'=>''),
				array('parentField'=>'ship_street', 'inventoryField'=>'ship_street', 'defaultValue'=>''),
				array('parentField'=>'ship_state', 'inventoryField'=>'ship_state', 'defaultValue'=>''),
				array('parentField'=>'ship_code', 'inventoryField'=>'ship_code', 'defaultValue'=>''),
				array('parentField'=>'ship_country', 'inventoryField'=>'ship_country', 'defaultValue'=>''),
				array('parentField'=>'ship_pobox', 'inventoryField'=>'ship_pobox', 'defaultValue'=>'')
		);
	}

	/**
	 * Extended and Modifiied by Phu Vo on 2019.09.16 to prevent delete personal Account
	 */
	public function delete() {
		if (self::isPersonalAccount($this->getId())) return;
		parent::delete();
	}

	/**
	 * Extended and Modifiied by Phu Vo on 2019.09.16 to prevent delete personal Account
	 */
	public function isDeletable() {
		if (self::isPersonalAccount($this->getId())) return false;
		return parent::isDeletable();
	}

	/**
	 * Extended and Modifiied by Phu Vo on 2019.09.16 to prevent delete personal Account
	 */
	public function isEditable() {
		if (self::isPersonalAccount($this->getId())) return false;
		return parent::isEditable();
	}

	/**
	 * Check if this record is personal account
	 * @param Number recordId
	 * @return Boolean True for personal account
	 * @author Phu Vo (2019.09.16)
	 */
	static function isPersonalAccount($recordId) {
		global $adb;

		$sql = "SELECT 1 FROM vtiger_account AS a 
			INNER JOIN vtiger_crmentity AS e ON (a.accountid = e.crmid AND e.deleted = 0) 
			WHERE a.accountid = ? AND a.account_no = 'PACC'
		";
		$result = $adb->pquery($sql, [$recordId]);

		return $adb->fetchByAssoc($result) ? true : false;
	}

	// Added by Phuc on 2020.06.26 to save type
	static function updateAccountType($accountId, $type) {
		$db = PearDatabase::getInstance();
		$sql = "UPDATE vtiger_account SET account_type = ? WHERE accountid = ?";
		$result = $db->pquery($sql, [$type, $accountId]);
	}
	// Ended by Phuc
}
