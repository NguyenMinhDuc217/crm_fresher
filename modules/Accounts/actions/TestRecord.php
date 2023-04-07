<?php
    // Added by Minh Duc on 06.04.2023
    
    class Accounts_TestRecord_Action extends Vtiger_Action_Controller {

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
            $matchedProduct = Products_Record_Model::getInstanceFromIdBySerial($request->get('serial'));

            // Update product name
            if(!empty($request->get('productName'))){
                    $productName =  $request->get('productName');
                    $matchedProduct->set('productname', $productName);
                    $matchedProduct->set('mode', 'edit');
                    $matchedProduct->save();
            }

            $productInfo = $matchedProduct->getData();

            // Fix error font
            $productInfo['productname'] = html_entity_decode($productInfo['productname']);
            
            if($productInfo){
                $warrantyStatus = (strtotime($productInfo['expiry_date']) > strtotime(date('Y-m-d'))) ? "valid" : "ended";
                $warrantyStatusLabelKey = ($warrantyStatus == "valid") ? "LBL_WARRANTY_STATUS_VALID" : "LBL_WARRANTY_STATUS_ENDED";

                $productInfo['warranty_status'] = $warrantyStatus;
                $productInfo['warranty_status_label'] = vtranslate($warrantyStatusLabelKey, 'Products');
            }

            //Respone
            $result = array('matched_product' => $productInfo);
            $response = new Vtiger_Response();
            $response->setResult($result);
            $response->emit();
        }
    }
?>