<?php
// Added by Minh Duc on 07.04.2023
// Show list account by type Competior
class Accounts_AccountListByType_View extends CustomView_Base_View {

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
        $matchedAccountList = Accounts_Record_Model::getListAccountByAccountType();
        $viewer = $this->getViewer($request);

            $viewer->assign('RESULT', $matchedAccountList);

        $viewer->display('modules/Accounts/tpls/AccountListByType.tpl');
    }

    function renderResult($matchedAccountList){
        if($matchedAccountList == null){
            return vtranslate('LBL_WARRANTY_SERIAL_NOT_FOUND', 'Products');
        }

        $warrantyStatus = vtranslate('LBL_WARRANTY_STATUS_VALID', 'Products');
        $statusLabel = "label-success";

        $viewer = new Vtiger_Viewer();
        $viewer->assign('PRODUCT_RECORD', $matchedAccountList);
        $viewer->assign('WARRANTY_STATUS', $warrantyStatus);
        $viewer->assign('STATUS_LABEL', $statusLabel);
        $result = $viewer->fetch('modules/Products/tpls/AccountListByType.tpl');

        return $result;
    }
}
