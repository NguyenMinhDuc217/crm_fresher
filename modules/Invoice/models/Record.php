<?php
/*+***********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 *************************************************************************************/

/**
 * Inventory Record Model Class
 */
class Invoice_Record_Model extends Inventory_Record_Model {

	public function getCreatePurchaseOrderUrl() {
		$purchaseOrderModuleModel = Vtiger_Module_Model::getInstance('PurchaseOrder');
		return "index.php?module=".$purchaseOrderModuleModel->getName()."&view=".$purchaseOrderModuleModel->getEditViewName()."&invoice_id=".$this->getId();
	}

	// Added by Phuc on 2020.01.20
	static function getSummaryReceivedDetails($entityId) {
		global $adb;

		$sql = "SELECT balance, received FROM vtiger_invoice WHERE invoiceid = ?";
		$result = $adb->pquery($sql, [$entityId]);
		$result = $adb->fetchByAssoc($result);

		return $result;
	}
	// Ended by Phuc
}