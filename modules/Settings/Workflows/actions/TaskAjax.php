<?php
/*+***********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 *************************************************************************************/

class Settings_Workflows_TaskAjax_Action extends Settings_Vtiger_IndexAjax_View {

	function __construct() {
		parent::__construct();
		$this->exposeMethod('Delete');
		$this->exposeMethod('ChangeStatus');
		$this->exposeMethod('Save');
	}
	public function validateRequest(Vtiger_Request $request) {
		$request->validateWriteAccess();
	}

	public function process(Vtiger_Request $request) {
		$mode = $request->getMode();
		if(!empty($mode)) {
			$this->invokeExposedMethod($mode, $request);
			return;
		}
	}

	public function Delete(Vtiger_Request $request){
		$record = $request->get('task_id');
		if(!empty($record)) {
			$taskRecordModel = Settings_Workflows_TaskRecord_Model::getInstance($record);
			$taskRecordModel->delete();
			$response = new Vtiger_Response();
			$response->setResult(array('ok'));
			$response->emit();
		}
	}

	public function ChangeStatus(Vtiger_Request $request) {
		$record = $request->get('task_id');
		if(!empty($record)) {
			$taskRecordModel = Settings_Workflows_TaskRecord_Model::getInstance($record);
			$taskObject = $taskRecordModel->getTaskObject();
			if($request->get('status') == 'true')
				$taskObject->active = true;
			else
				$taskObject->active = false;
			$taskRecordModel->save();
			$response = new Vtiger_Response();
			$response->setResult(array('ok'));
			$response->emit();
		}
	}

	public function Save(Vtiger_Request $request) {

		$workflowId = $request->get('for_workflow');
		if(!empty($workflowId)) {
			$record = $request->get('task_id');
			if($record) {
				$taskRecordModel = Settings_Workflows_TaskRecord_Model::getInstance($record);
			} else {
				$workflowModel = Settings_Workflows_Record_Model::getInstance($workflowId);
				$taskRecordModel = Settings_Workflows_TaskRecord_Model::getCleanInstance($workflowModel, $request->get('taskType'));
			}

			$taskObject = $taskRecordModel->getTaskObject();
			$taskObject->summary = $request->get("summary");

			$active = $request->get("active");
			if($active == "true") {
				$taskObject->active = true;
			} else if ($active == "false"){
				$taskObject->active = false;
			}
			$checkSelectDate = $request->get('check_select_date');

			if(!empty($checkSelectDate)){
				$trigger = array(
					'days'=>($request->get('select_date_direction') == 'after' ? 1 : -1) * (int)$request->get('select_date_days'),
					'field'=>$request->get('select_date_field')
					);
				$taskObject->trigger = $trigger;
			} else {
				$taskObject->trigger = null;
			}

			$fieldNames = $taskObject->getFieldNames();
			$getRawFields = array('content', 'fromEmail');  // Removed field_value_mapping by Hieu Nguyen on 2020-01-09 to avoid XSS
			foreach($fieldNames as $fieldName){
				if(in_array($fieldName, $getRawFields)) {
					$taskObject->$fieldName = $request->getRaw($fieldName);

                    // Added by Hieu Nguyen on 2020-11-05 to support saving template without purified
                    if ($fieldName == 'content' && $request->getRaw('safe_content') == 'on') {
                        $taskObject->$fieldName = $request->getRaw($fieldName, '', true);
                    }
                    // End Hieu Nguyen
				} else {
					$taskObject->$fieldName = $request->get($fieldName);
				}
				if ($fieldName == 'calendar_repeat_limit_date') {
					$taskObject->$fieldName = DateTimeField::convertToDBFormat($request->get($fieldName));
				}

                // Added by Hieu Nguyen on 2020-10-26 to set option assign owner as parent record owners
                if ($fieldName == 'assign_parent_record_owners') {
                    $taskObject->$fieldName = ($request->get($fieldName) == 'on') ? 1 : 0;
                }
                // End Hieu Nguyen
			}

			require_once 'modules/com_vtiger_workflow/expression_engine/include.inc';

			$fieldMapping = $taskObject->field_value_mapping;   // Removed json decode wrapper by Hieu Nguyen on 2020-01-09 as $request->get() already return decoded array
			if (is_array($fieldMapping)) {
				foreach ($fieldMapping as $key => $mappingInfo) {
					if ($mappingInfo['valuetype'] == 'expression') {
						try {
							$parser = new VTExpressionParser(new VTExpressionSpaceFilter(new VTExpressionTokenizer($mappingInfo['value'])));
							$expression = $parser->expression();
						} catch (Exception $e) {
							$result = new Vtiger_Response();
							$result->setError($mappingInfo);
							$result->emit();
							return;
						}
					}
				}
			}

			$taskType = get_class($taskObject);
			if ($taskType === 'VTCreateEventTask' || $taskType === 'VTCreateTodoTask') {
				if($taskType === 'VTCreateEventTask') {
					$module = 'Events';
				} else {
					$module = 'Calendar';
				}
				$moduleModel = Vtiger_Module_Model::getInstance($module);
				$fieldsList = $moduleModel->getFields();
				foreach($fieldsList as $fieldName => $fieldModel) {
					$fieldValue = $request->get($fieldName);
					if($fieldModel->get('uitype') == 33) {
						if(is_array($fieldValue)) {
							$field_list = implode(' |##| ', $fieldValue);
						} else {
							$field_list = $fieldValue;
						}
						$taskObject->$fieldName = $field_list;
					} else {
						$taskObject->$fieldName = $fieldValue;
					}
				}
			}

            // Commented these lines by Hieu Nguyen on 2020-07-01 to save raw owner field value
			/*if ($taskType === 'VTCreateEntityTask') {
				$relationModuleModel = Vtiger_Module_Model::getInstance($taskObject->entity_type);
				$ownerFieldModels = $relationModuleModel->getFieldsByType('owner');

				$fieldMapping = $taskObject->field_value_mapping;
				foreach ($fieldMapping as $key => $mappingInfo) {
					if (array_key_exists($mappingInfo['fieldname'], $ownerFieldModels)) {
						$userRecordModel = Users_Record_Model::getInstanceById($mappingInfo['value'], 'Users');
						$ownerName = $userRecordModel->get('user_name');

						if (!$ownerName && !empty($mappingInfo['value'])) {
							$groupRecordModel = Settings_Groups_Record_Model::getInstance($mappingInfo['value']);
							$ownerName = $groupRecordModel->getName();
						}
						$fieldMapping[$key]['value'] = $ownerName;
					}
				}
				$taskObject->field_value_mapping = Zend_Json::encode($fieldMapping);
			}*/

			$taskRecordModel->save();
			$response = new Vtiger_Response();
			$response->setResult(array('for_workflow'=>$workflowId));
			$response->emit();
		}
	}
}
