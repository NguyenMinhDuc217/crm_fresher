<?php
//Added by Minh Duc on 05.04.2023
class Accounts_DynamicTableDemo_View extends CustomView_Base_View {

    function __construct()
    {
        parent::__construct($isFullView = true);
    }

    function checkPermission(Vtiger_Request $request)
    {
        $moduleName = $request->getModule();

        $allowAcess = true;

        if (!$allowAcess) {
            throw new AppException(vtranslate($moduleName, $moduleName) . ' ' . vtranslate('LBL_NOT_ACCESSIBLE'));
        }
    }

    function process(Vtiger_Request $request){

        $viewer = $this->getViewer($request);

        $viewer->display('modules/Accounts/tpls/DynamicTableDemo.tpl');
    }
}
