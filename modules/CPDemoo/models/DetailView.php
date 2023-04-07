<?php

class CPDemoo_DetailView_Model extends Vtiger_DetailView_Model{

    public function getDetailViewLinks($linkParams){
        $linkModeList = parent::getDetailViewLinks($linkParams);
        $currentUserModel = Users_Privileges_Model::getCurrentUserPrivilegesModel();
        $moduleModel = $this->getModule();

        for($i = 0; $i < count($linkModeList['DETAILVIEWBASIC']); $i++){
            // Modify a basic button
            if($linkModeList['DETAILVIEWBASIC'][$i]->linklabel == 'LBL_EDIT') {
                $linkModeList['DETAILVIEWBASIC'][$i]->linkurl = 'javascript:alert("Modified Basic Button!")';
            }
        }

        // trả về kết quả cho biết user có được phép truy cập module này hay không
        if ($currentUserModel->hasModulePermission($moduleModel->getId())) {
            // Show additional button
            $button = array(
                'linktype' => 'DETAILVIEWBASIC',
                'linklabel' => 'LBL_DEMO_DETAILVIEW_BASIC_BUTTON',
                'linkurl' => 'javascript:alert("HELLO WORLD")',
            );

            $linkModeList['DETAILVIEWBASIC'][] = Vtiger_Link_Model::getInstanceFromValues($button);
        }

        for($i = 0; $i < count($linkModeList['DETAILVIEW']); $i++){
            // Hide an advanced button
            if($linkModeList['DETAILVIEW'][$i]->linklabel == 'LBL_DUPLICATE') {
                unset($linkModeList['DETAILVIEW'][$i]);
            }

            // Modify an advanced button
            if($linkModeList['DETAILVIEW'][$i]->linklabel == 'LBL_DELETE') {
                $linkModeList['DETAILVIEW'][$i]->linkurl = 'javascript:alert("Modified Advanced Button!")';
            }
        }

        // trả về kết quả cho biết user có được phép truy cập action trong module này hay không
        if ($currentUserModel->hasModuleActionPermission($moduleModel->getId(), 'EditView')) {
            // Show additional button
            $button = array(
                'linktype' => 'DETAILVIEW',
                'linklabel' => 'LBL_DEMO_DETAILVIEW_ADVANCED_BUTTON',
                'linkurl' => 'javascript:alert("HELLO WORLD")',
            );

            $linkModeList['DETAILVIEW'][] = Vtiger_Link_Model::getInstanceFromValues($button);
        }

        return $linkModeList;
    }

    public function getListViewMassActions($linkParams){
        $massActions = parent::getListViewMassActions($linkParams);
        $moduleModel = $this->getModule();

        for($i = 0; $i < count($massActions['LISTVIEWMASSACTION']); $i++){
            // Hide a button
            if($massActions['LISTVIEWMASSACTION'][$i]->linklabel == 'LBL_DELETE'){
                unset($massActions['LISTVIEWMASSACTION'][$i]);
            }
        }

        if (Users_Privileges_Model::isPermitted($moduleModel->getName(), 'CreateView')) {
            // Show additional button
            $button = array(
                'linktype' => 'LISTVIEWMASSACTION',
                'linklabel' => 'LBL_DEMO_LISTVIEW_MASS_ACTION_BUTTON',
                'linkurl' => 'javascript:alert("HELLO WORLD")',
            );

            $massActions['LISTVIEWMASSACTION'][] = Vtiger_Link_Model::getInstanceFromValues($button);
        }

        return $massActions;
    }
}