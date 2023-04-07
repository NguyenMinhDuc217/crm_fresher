<?php
    class Products_CheckWarranty3_View extends CustomView_Base_View {
        
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
            
            //link view 
            $viewer->display('modules/Products/tpls/CheckWarranty3.tpl');
        }

    }
?>