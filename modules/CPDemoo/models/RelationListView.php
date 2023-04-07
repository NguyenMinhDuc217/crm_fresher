<?php
class CPDemoo_RelationListView_Model extends Vtiger_RelationListView_Model{

    public function getLinks(){
        $parentModel = $this->getParentRecordModel();
        $relationModel = $this->getRelationModel();
        $relationModulName = $relationModel->getRelationModuleModel()->getName();
        $headerLinks = parent::getLinks();

        if($relationModulName == 'Contacts'){
            unset($headerLinks[0]); // hide button select;
            unset($headerLinks[1]); // hide button create;

            $headerLinks = []; // remove all button

            if(Users_Privileges_Model::isPermitted('SMSNotifier', 'CreateView')){
                //Show additional button
                $newLink = [
                    'linktype' => 'LISTVIEWBASIC',
                    'linklabel' => vtranslate('LBL_DEMO_RELATED_LIST_BASIC_BUTTON', 'Contacts'),
                    'linkurl' => 'javascript:alert("HELLO WORLD")',
                    'linkicon' => '',
                ];

                $headerLinks['LISTVIEWBASIC'][] = Vtiger_Link_Model::getInstanceFromValues($newLink);
            }
        }

        return $headerLinks;
    }
}