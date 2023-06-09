<?php

/*+**********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.1
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 ************************************************************************************/

class Settings_PickListDependency_SaveAjax_Action extends Settings_Vtiger_Index_Action {
    
    public function process(Vtiger_Request $request) {
        $sourceModule = $request->get('sourceModule');
        $sourceField = $request->get('sourceField');
        $targetField = $request->get('targetField');
        $recordModel = Settings_PickListDependency_Record_Model::getInstance($sourceModule, $sourceField, $targetField);
        
        $response = new Vtiger_Response();
        try{
            $result = $recordModel->save($request->get('mapping'));
            $response->setResult(array('success'=>$result));

            // Added by Hieu Nguyen on 2021-08-09 to save audit log
            Vtiger_AdminAudit_Helper::saveLog('PicklistDependency', "Save picklist dependency mapping from {$sourceField} to {$targetField}", $request);
            // End Hieu Nguyen
        } catch(Exception $e) {
            $response->setError($e->getCode(), $e->getMessage());
        }
        $response->emit();
    }
    
    public function validateRequest(Vtiger_Request $request) {
        $request->validateWriteAccess();
    }
}