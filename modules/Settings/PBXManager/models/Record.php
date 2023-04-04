<?php
/*+***********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 *************************************************************************************/

class Settings_PBXManager_Record_Model extends Settings_Vtiger_Record_Model {

    const tableName = 'vtiger_pbxmanager_gateway';
    
    // Implemented by Hieu Nguyen on 2018-10-05
    public function getSettingInfoMsg() {
        $connector = Settings_PBXManager_Module_Model::getConnector($this->get('gateway'));

        return $connector->getSettingInfoMsg();
    }

    // Implemented by Hieu Nguyen on 2018-10-05
    public function getSettingHelpText() {
        $connector = Settings_PBXManager_Module_Model::getConnector($this->get('gateway'));

        return $connector->getSettingHelpText();
    }

    public function getId() {
        return $this->get('id');
    }

    public function getName() {
    }
    
    public function getModule(){
        return new Settings_PBXManager_Module_Model;
    }
    
    static function getCleanInstance(){
        return new self;
    }
    
     public static function getInstance(){
        $serverModel = new self();
        $db = PearDatabase::getInstance();
        $query = 'SELECT * FROM '.self::tableName;
        $gatewatResult = $db->pquery($query, array());
        $gatewatResultCount = $db->num_rows($gatewatResult);
        
        // Added by Hieu Nguyen on 2018-10-05 to set default gateway
        $serverModel->set('gateway', 'PBXManager');
        // End Hieu Nguyen

        if($gatewatResultCount > 0) {
            $rowData = $db->query_result_rowdata($gatewatResult, 0);
            $serverModel->set('gateway',$rowData['gateway']);
            $serverModel->set('id',$rowData['id']);
            $parameters = Zend_Json::decode(decode_html($rowData['parameters']));
            foreach ($parameters as $fieldName => $fieldValue) {
                    $serverModel->set($fieldName,$fieldValue);
            }
            return $serverModel;
        }
        return $serverModel;
    }
    
    public static function getInstanceById($recordId) { // Removed the second param by Hieu Nguyen on 2019-01-22
		$db = PearDatabase::getInstance();
		$result = $db->pquery('SELECT * FROM '.self::tableName.' WHERE id = ?', array($recordId));

		if ($db->num_rows($result)) {
			//$moduleModel = Settings_Vtiger_Module_Model::getInstance($qualifiedModuleName);   // Commented out this line by Hieu Nguyen on 2019-01-22
			$rowData = $db->query_result_rowdata($result, 0);

			$recordModel = new self();
			$recordModel->setData($rowData);

			$parameters = Zend_Json::decode(decode_html($recordModel->get('parameters')));
			foreach ($parameters as $fieldName => $fieldValue) {
				$recordModel->set($fieldName, $fieldValue);
			}
			return $recordModel;
		}
		return false;
	}
    
    public function save() {
		$db = PearDatabase::getInstance();
		$parameters = [];   // Fixed by Hieu Nguyen on 2019-01-22
        $selectedGateway = $this->get('gateway');
        
        // Modified by Hieu Nguyen on 2018-10-05
        $connector = Settings_PBXManager_Module_Model::getConnector($selectedGateway);
        
        foreach($connector->getSettingFields() as $field => $type) {
            $parameters[$field] = $this->get($field);
        }

        $this->set('parameters', Zend_Json::encode($parameters));
        $params = array($selectedGateway, $this->get('parameters'));
        // End Hieu Nguyen
        
		$id = $this->getId();
                
		if ($id) {
			$query = 'UPDATE '.self::tableName.' SET gateway=?, parameters = ? WHERE id = ?';
			array_push($params, $id);
		} else {
			$query = 'INSERT INTO '.self::tableName.'(gateway, parameters) VALUES(?, ?)';
		}
		$db->pquery($query, $params);
	}
}
