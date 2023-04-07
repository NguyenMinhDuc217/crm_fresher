<?php
    class Products_DeclareAjax_Action extends Vtiger_Action_Controller {

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
            if($request->isAjax()){
                $productName = $request->get('product_name');
                $website = $request->get('website');
                $productSerial = Products_Record_Model::checkSerialProducts($request->get('serial_no'));

                if($productSerial < 1){
                    $serialNo = $request->get('serial_no');
                    $warrantyStartDate = date('Y-m-d', strtotime($request->get('warranty_start_date')));;
                    $warrantyEndDate =  date('Y-m-d', strtotime($request->get('warranty_end_date')));;
                    $productId = Products_Record_Model::declareProduct($productName, $website, $serialNo, $warrantyStartDate, $warrantyEndDate);
                    $result = array('success' => $productId ? true : false);
                }
                else{
                    $result = array('success' => false);
                }
                
                //Respone
                $response = new Vtiger_Response();
                $response->setResult($result);
                $response->emit();
            }
        }
    }
