<?php
/*+***********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 *************************************************************************************/

class Vtiger_Base_UIType extends Vtiger_Base_Model {

	/**
	 * Function to get the Template name for the current UI Type Object
	 * @return <String> - Template Name
	 */
	public function getTemplateName() {
		return 'uitypes/String.tpl';
	}

	/**
	 * Function to get the DB Insert Value, for the current field type with given User Value
	 * @param <Object> $value
	 * @return <Object>
	 */
	public function getDBInsertValue($value) {
		return $value;
	}

	/**
	 * Function to get the Value of the field in the format, the user provides it on Save
	 * @param <Object> $value
	 * @return <Object>
	 */
	public function getUserRequestValue($value) {
		return $value;
	}

	/**
	 * Function to get the Display Value, for the current field type with given DB Insert Value
	 * @param <Object> $value
	 * @return <Object>
	 */
	public function getDisplayValue($value, $record=false, $recordInstance=false) {
		return $value;
	}

	/**
	 * Static function to get the UIType object from Vtiger Field Model
	 * @param Vtiger_Field_Model $fieldModel
	 * @return Vtiger_Base_UIType or UIType specific object instance
	 */
	public static function getInstanceFromField($fieldModel) {
		$fieldDataType = $fieldModel->getFieldDataType();
		$uiTypeClassSuffix = ucfirst($fieldDataType);
		$moduleName = $fieldModel->getModuleName();
		$moduleSpecificUiTypeClassName = $moduleName.'_'.$uiTypeClassSuffix.'_UIType';
		$uiTypeClassName = 'Vtiger_'.$uiTypeClassSuffix.'_UIType';
		$fallBackClassName = 'Vtiger_Base_UIType';

		$moduleSpecificFileName = 'modules.'. $moduleName .'.uitypes.'.$uiTypeClassSuffix;
		$uiTypeClassFileName = 'modules.Vtiger.uitypes.'.$uiTypeClassSuffix;

		$moduleSpecificFilePath = Vtiger_Loader::resolveNameToPath($moduleSpecificFileName);
		$completeFilePath = Vtiger_Loader::resolveNameToPath($uiTypeClassFileName);

		if(file_exists($moduleSpecificFilePath)) {
			$instance = new $moduleSpecificUiTypeClassName();
		}
		else if(file_exists($completeFilePath)) {
			$instance = new $uiTypeClassName();
		} else {
			$instance = new $fallBackClassName();
		}
		$instance->set('field', $fieldModel);
		return $instance;
	}

	/**
	 * Function to get the display value in edit view
	 * @param reference record id
	 * @return link
	 */
	public function getEditViewDisplayValue($value) {
		return htmlentities($value);	// Modified by Hieu Nguyen on 2021-10-22 to escape special characters from rendering HTML to avoid error
	}

    /**
	 * Function to get the Detailview template name for the current UI Type Object
	 * @return <String> - Template Name
	 */
	public function getDetailViewTemplateName() {
		return 'uitypes/StringDetailView.tpl';
	}

	/**
	 * Function to get Display value for RelatedList
	 * @param <String> $value
	 * @return <String>
	 */
	public function getRelatedListDisplayValue($value) {
		return $this->getDisplayValue($value);
	}
    
    public function getListSearchTemplateName() {
        return 'uitypes/FieldSearchView.tpl';
    }
    
    // Implemented by Hieu Nguyen on 2019-12-20
    public function renderDetailViewValue($recordModel, $currentViewer = null) { // Bug #371: Modified by Phu Vo on 2020.03.18
        $userModel = Users_Record_Model::getCurrentUserModel();
        $moduleName = $recordModel->getModule()->getName();
        $fieldModel = $this->get('field');
        $fieldName = $fieldModel->getName();

        if (empty($fieldModel->get('fieldvalue'))) {
            $fieldModel->set('fieldvalue', $recordModel->get($fieldName));
        }
        
        $viewer = !empty($currentViewer) ? $currentViewer : new Vtiger_Viewer(); // Bug #371: Modified by Phu Vo on 2020.03.18
        $viewer->assign('FIELD_MODEL', $fieldModel);
        $viewer->assign('USER_MODEL', $userModel);
        $viewer->assign('MODULE', $moduleName);
        $viewer->assign('RECORD', $recordModel);

        $templateFile = $this->getDetailViewTemplateName();

        if (!file_exists($templateFile)) {
            if (file_exists('layouts/v7/modules/'. $moduleName .'/'. $templateFile)) {
                $templateFile = 'layouts/v7/modules/'. $moduleName .'/'. $templateFile;
            }
            else {
                $templateFile = 'layouts/v7/modules/Vtiger/'. $templateFile;
            }
        }

        $html = trim($viewer->fetch($templateFile));

        return $html;
    }
}