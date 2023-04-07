<?php
    // Added by Minh Duc on 06.04.2023
    class Accounts_AccountListByType_Action extends Vtiger_Action_Controller {

        function checkPermission(Vtiger_Request $request){
            $moduleName = $request->getModule();
            $moduleModel = Vtiger_Module_Model::getInstance($moduleName);
            $currentUserPriviligesModel = Users_Privileges_Model::getCurrentUserPrivilegesModel();

            $allowAcess = $currentUserPriviligesModel->hasModulePermission($moduleModel->getId());

            if(!$allowAcess){
                throw new AppException(vtranslate($moduleName, $moduleName). ' ' . vtranslate('LBL_NOT_ACCESSIBLE'));
            }
        }

        function process(Vtiger_Request $request){
            $matchedAccountList = Accounts_Record_Model::getListAccountByAccountType();
            
            $response = new Vtiger_Response();
            $response->setResult($matchedAccountList);
            $response->emit();
        }
    }
?>