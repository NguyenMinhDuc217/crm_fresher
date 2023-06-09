<?php
/*+***********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 *************************************************************************************/

class Reports_DeleteAjax_Action extends Vtiger_DeleteAjax_Action {
    
	// Modified by Hieu Nguyen on 2021-08-20 to fix bug owner can not delete report
	public function checkPermission(Vtiger_Request $request) {
		$moduleName = $request->getModule();
		$recordId = $request->get('record');

		$this->recordModel = Reports_Record_Model::getInstanceById($recordId, $moduleName);

		if ($this->recordModel->isDefault() || !$this->recordModel->isEditable() || !$this->recordModel->isEditableBySharing()) {
			throw new AppException(vtranslate('LBL_REPORT_DELETE_DENIED', $moduleName));
		}
	}

	// Refactored code by Hieu Nguyen on 2021-08-20 to be easier to maintain
	public function process(Vtiger_Request $request) {
		$moduleName = $request->getModule();
		$this->recordModel->delete();

		$response = new Vtiger_Response();
		$response->setResult([vtranslate('LBL_REPORTS_DELETED_SUCCESSFULLY', $moduleName)]);
		$response->emit();
	}
}
