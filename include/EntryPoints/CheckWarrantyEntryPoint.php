<?php

/*
    EntryPoint structure
    Author: Hieu Nguyen
    Date: 2018-08-24
    Purpose: provide an entry point structure similar to SugarCRM
    Usage:
        - Copy this file into a new file, then rename the file name and class name that is corresponding to your logic
        - When you access /entrypoint.php?name=<Entry-Point-Name>, the entry point inside include/EntryPoints/<Entry-Point-Name>.php will be activated
*/

class CheckWarrantyEntryPoint extends Vtiger_EntryPoint
{

    function process(Vtiger_Request $request)
    {
        // Handle your logic and response the result here
        $viewer = new Vtiger_Viewer();
        $matchedProduct = Products_Record_Model::getInstanceBySerial($request->get('serial'));
        $viewer->assign('RESULT', $this->renderResult($matchedProduct));
        //link view 
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
