<?php
/*+***********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 *************************************************************************************/

class Users_DetailView_Model extends Vtiger_DetailView_Model {

	/**
	 * Function to get the detail view links (links and widgets)
	 * @param <array> $linkParams - parameters which will be used to calicaulate the params
	 * @return <array> - array of link models in the format as below
	 *                   array('linktype'=>list of link models);
	 */
	public function getDetailViewLinks($linkParams) {
		$currentUserModel = Users_Record_Model::getCurrentUserModel();
		$recordModel = $this->getRecord();
		$recordId = $recordModel->entity->id; // Modified by Phu Vo on 2021.06.02 to fix empty id cause error

		$linkModelList = array();
		if (($currentUserModel->isAdminUser() == true || $currentUserModel->get('id') == $recordId) && $recordModel->get('status') == 'Active' ) {
			$recordModel = $this->getRecord();

			$detailViewLinks = array(
				array(
				'linktype' => 'DETAILVIEWBASIC',
				'linklabel' => 'LBL_EDIT',
				'linkurl' => $recordModel->getEditViewUrl(),
				'linkicon' => ''
				)
			);

			foreach ($detailViewLinks as $detailViewLink) {
				$linkModelList['DETAILVIEWBASIC'][] = Vtiger_Link_Model::getInstanceFromValues($detailViewLink);
			}
			
			$detailViewPreferenceLinks = array(
				array(
					'linktype' => 'DETAILVIEWPREFERENCE',
					'linklabel' => 'LBL_EDIT',
					'linkurl' => $recordModel->getPreferenceEditViewUrl(),
					'linkicon' => ''
				)
			);

			foreach ($detailViewPreferenceLinks as $detailViewLink) {
				$linkModelList['DETAILVIEWPREFERENCE'][] = Vtiger_Link_Model::getInstanceFromValues($detailViewLink);
			}

            $detailViewActionLinks = [];    // Modified by Hieu Nguyen on 2021-07-13

			if(Users_Privileges_Model::isPermittedToChangeUsername($recordId)){
				$detailViewActionLinks[] = array(
												'linktype' => 'DETAILVIEW',
												'linklabel' => 'LBL_CHANGE_USERNAME',
												'linkurl' => "javascript:Users_Detail_Js.triggerChangeUsername('" . $recordModel->getChangeUsernameUrl() . "')",
												'linkicon' => ''
											);
			}

			$detailViewActionLinks[] = array(
										'linktype' => 'DETAILVIEW',
										'linklabel' => 'LBL_CHANGE_PASSWORD',
										'linkurl' => "javascript:Users_Detail_Js.triggerChangePassword('".$recordModel->getChangePwdUrl()."','Users')",
										'linkicon' => ''
									);
			$detailViewActionLinks[] = array(
										'linktype'	=> 'DETAILVIEW',
										'linklabel' => 'LBL_CHANGE_ACCESS_KEY',
										'linkurl'	=> "javascript:Users_Detail_Js.triggerChangeAccessKey('index.php?module=Users&action=SaveAjax&mode=changeAccessKey&record=$recordId')",
										'linkicon'	=> ''
									);

            // Moved the Deactivate button to the end of the list by Hieu Nguyen on 2021-07-13
            if ($currentUserModel->isAdminUser() && $currentUserModel->get('id') != $recordId) {
				$detailViewActionLinks[] = [
                    'linktype' => 'DETAILVIEW',
                    'linklabel' => 'LBL_DEACTIVATE_USER',
                    'linkurl' => 'javascript:Users_Detail_Js.triggerDeleteUser("' . $recordModel->getDeleteUrl() . '")',
                    'linkicon' => ''
                ];
			}
            // End Hieu Nguyen

			foreach ($detailViewActionLinks as $detailViewLink) {
				$linkModelList['DETAILVIEW'][] = Vtiger_Link_Model::getInstanceFromValues($detailViewLink);
			}
			return $linkModelList;
		}
	}
}