<?php
    class Products_CheckWarranty_View extends CustomView_Base_View {
        
        function __construct(){
            parent::__construct($isFullView = true);    
        }

        function checkPermission(Vtiger_Request $request){
            $moduleName = $request->getModule();

            $allowAcess = true;

            if(!$allowAcess){
                throw new AppException(vtranslate($moduleName, $moduleName). ' ' . vtranslate('LBL_NOT_ACCESSIBLE'));
            }
        }

        function process(Vtiger_Request $request){
            //Get view from request
            $viewer = $this->getViewer($request);

            if(!empty($_POST)){
                //get product from request
                $matchedProduct = Products_Record_Model::getInstanceBySerial($request->get('serial'));
                //set variable to view
                $viewer->assign('RESULT', $this->renderResult($matchedProduct));
            }

            //linh view 
            $viewer->display('modules/Products/tpls/CheckWarranty.tpl');
        }

        function renderResult($matchedProduct){
            if($matchedProduct == null || $matchedProduct->get('productid') == ''){
                return vtranslate('LBL_WARRANTY_SERIAL_NOT_FOUND', 'Products');
            }

            $warrantyStatus = vtranslate('LBL_WARRANTY_STATUS_VALID', 'Products');
            $statusLabel = "label-success";

            if(strtotime($matchedProduct->get('expiry_date')) < strtotime(date('Y-m-d'))){
                $warrantyStatus = vtranslate('LBL_WARRANTY_STATUS_ENDED', 'Products');
                $statusLabel = "label-danger";
            }

            $viewer = new Vtiger_Viewer();
            $viewer->assign('PRODUCT_RECORD', $matchedProduct);
            $viewer->assign('WARRANTY_STATUS', $warrantyStatus);
            $viewer->assign('STATUS_LABEL', $statusLabel);
            $result = $viewer->fetch('modules/Products/tpls/CheckWarrantyResult.tpl');

            return $result;
        }
    }
?>