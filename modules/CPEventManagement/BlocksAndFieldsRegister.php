<?php

/*
	System auto-generated on 2021-08-19 05:27:07 pm by admin. 
	THIS FILE IS FOR DEVELOPER TO UPDATE FROM LAYOUT EDITOR. YOU CAN MODIFY THIS FILE FOR CUSTOMIZING BUT REMEMBER THAT ALL COMMENTS WILL BE REMOVED!!!
*/

$editViewBlocks = array(
    'LBL_GENERAL_INFORMATION' => array(
        'blocklabel' => 'LBL_GENERAL_INFORMATION',
        'sequence' => '1',
        'show_title' => '0',
        'visible' => '0',
        'create_view' => '0',
        'edit_view' => '0',
        'detail_view' => '0',
        'display_status' => '1',
        'iscustom' => '0'
    ),
    'LBL_TRACKING_INFOMATION' => array(
        'blocklabel' => 'LBL_TRACKING_INFOMATION',
        'sequence' => '2',
        'show_title' => '0',
        'visible' => '0',
        'create_view' => '0',
        'edit_view' => '0',
        'detail_view' => '0',
        'display_status' => '1',
        'iscustom' => '0'
    )
);

$detailViewBlocks = array(
    'LBL_GENERAL_INFORMATION' => array(
        'blocklabel' => 'LBL_GENERAL_INFORMATION',
        'sequence' => '1',
        'show_title' => '0',
        'visible' => '0',
        'create_view' => '0',
        'edit_view' => '0',
        'detail_view' => '0',
        'display_status' => '1',
        'iscustom' => '0'
    ),
    'LBL_TRACKING_INFOMATION' => array(
        'blocklabel' => 'LBL_TRACKING_INFOMATION',
        'sequence' => '2',
        'show_title' => '0',
        'visible' => '0',
        'create_view' => '0',
        'edit_view' => '0',
        'detail_view' => '0',
        'display_status' => '1',
        'iscustom' => '0'
    )
);

$fields = array(
    'name' => array(
        'columnname' => 'name',
        'tablename' => 'vtiger_cpeventmanagement',
        'generatedtype' => '1',
        'uitype' => '2',
        'fieldname' => 'name',
        'fieldlabel' => 'LBL_NAME',
        'readonly' => '1',
        'presence' => '2',
        'defaultvalue' => '',
        'maximumlength' => '100',
        'sequence' => '1',
        'displaytype' => '1',
        'typeofdata' => 'V~M',
        'quickcreate' => '1',
        'quickcreatesequence' => '0',
        'info_type' => 'BAS',
        'masseditable' => '1',
        'helpinfo' => '',
        'summaryfield' => '1',
        'headerfield' => null,
        'isunique' => '0',
        'editview_sequence' => '1',
        'editview_presence' => '2',
        'columntype' => 'varchar(255)',
        'editview_block_name' => 'LBL_GENERAL_INFORMATION',
        'detailview_block_name' => 'LBL_GENERAL_INFORMATION'
    ),
    'cpeventmanagement_no' => array(
        'columnname' => 'cpeventmanagement_no',
        'tablename' => 'vtiger_cpeventmanagement',
        'generatedtype' => '1',
        'uitype' => '4',
        'fieldname' => 'cpeventmanagement_no',
        'fieldlabel' => 'CPEventManagement No',
        'readonly' => '1',
        'presence' => '2',
        'defaultvalue' => '',
        'maximumlength' => '100',
        'sequence' => '2',
        'displaytype' => '1',
        'typeofdata' => 'V~O',
        'quickcreate' => '1',
        'quickcreatesequence' => '0',
        'info_type' => 'BAS',
        'masseditable' => '1',
        'helpinfo' => '',
        'summaryfield' => '1',
        'headerfield' => null,
        'isunique' => '0',
        'editview_sequence' => '2',
        'editview_presence' => '2',
        'columntype' => 'varchar(100)',
        'editview_block_name' => 'LBL_GENERAL_INFORMATION',
        'detailview_block_name' => 'LBL_GENERAL_INFORMATION'
    ),
    'description' => array(
        'columnname' => 'description',
        'tablename' => 'vtiger_crmentity',
        'generatedtype' => '1',
        'uitype' => '19',
        'fieldname' => 'description',
        'fieldlabel' => 'LBL_DESCRIPTION',
        'readonly' => '1',
        'presence' => '2',
        'defaultvalue' => '',
        'maximumlength' => '100',
        'sequence' => '1',
        'displaytype' => '1',
        'typeofdata' => 'V~O',
        'quickcreate' => '1',
        'quickcreatesequence' => '0',
        'info_type' => 'BAS',
        'masseditable' => '1',
        'helpinfo' => '',
        'summaryfield' => '1',
        'headerfield' => null,
        'isunique' => '0',
        'editview_sequence' => '1',
        'editview_presence' => '2',
        'columntype' => 'mediumtext',
        'editview_block_name' => 'LBL_TRACKING_INFOMATION',
        'detailview_block_name' => 'LBL_TRACKING_INFOMATION'
    ),
    'assigned_user_id' => array(
        'columnname' => 'smownerid',
        'tablename' => 'vtiger_crmentity',
        'generatedtype' => '1',
        'uitype' => '53',
        'fieldname' => 'assigned_user_id',
        'fieldlabel' => 'LBL_ASSIGNED_TO',
        'readonly' => '1',
        'presence' => '2',
        'defaultvalue' => '',
        'maximumlength' => '100',
        'sequence' => '3',
        'displaytype' => '1',
        'typeofdata' => 'V~M',
        'quickcreate' => '1',
        'quickcreatesequence' => '0',
        'info_type' => 'BAS',
        'masseditable' => '1',
        'helpinfo' => '',
        'summaryfield' => '0',
        'headerfield' => null,
        'isunique' => '0',
        'editview_sequence' => '3',
        'editview_presence' => '2',
        'columntype' => 'int',
        'editview_block_name' => 'LBL_GENERAL_INFORMATION',
        'detailview_block_name' => 'LBL_GENERAL_INFORMATION'
    ),
    'main_owner_id' => array(
        'columnname' => 'main_owner_id',
        'tablename' => 'vtiger_crmentity',
        'generatedtype' => '1',
        'uitype' => '53',
        'fieldname' => 'main_owner_id',
        'fieldlabel' => 'LBL_MAIN_OWNER_ID',
        'readonly' => '1',
        'presence' => '2',
        'defaultvalue' => '',
        'maximumlength' => '100',
        'sequence' => '4',
        'displaytype' => '1',
        'typeofdata' => 'V~O',
        'quickcreate' => '1',
        'quickcreatesequence' => '0',
        'info_type' => 'BAS',
        'masseditable' => '1',
        'helpinfo' => '',
        'summaryfield' => '0',
        'headerfield' => null,
        'isunique' => '0',
        'editview_sequence' => '4',
        'editview_presence' => '2',
        'columntype' => 'int',
        'editview_block_name' => 'LBL_GENERAL_INFORMATION',
        'detailview_block_name' => 'LBL_GENERAL_INFORMATION'
    ),
    'createdby' => array(
        'columnname' => 'smcreatorid',
        'tablename' => 'vtiger_crmentity',
        'generatedtype' => '1',
        'uitype' => '52',
        'fieldname' => 'createdby',
        'fieldlabel' => 'LBL_CREATED_BY',
        'readonly' => '1',
        'presence' => '2',
        'defaultvalue' => '',
        'maximumlength' => '100',
        'sequence' => '5',
        'displaytype' => '1',
        'typeofdata' => 'V~O',
        'quickcreate' => '1',
        'quickcreatesequence' => '0',
        'info_type' => 'BAS',
        'masseditable' => '1',
        'helpinfo' => '',
        'summaryfield' => '0',
        'headerfield' => null,
        'isunique' => '0',
        'editview_sequence' => '5',
        'editview_presence' => '2',
        'columntype' => 'int',
        'editview_block_name' => 'LBL_GENERAL_INFORMATION',
        'detailview_block_name' => 'LBL_GENERAL_INFORMATION'
    ),
    'users_department' => array(
        'columnname' => 'users_department',
        'tablename' => 'vtiger_cpeventmanagement',
        'generatedtype' => '1',
        'uitype' => '16',
        'fieldname' => 'users_department',
        'fieldlabel' => 'LBL_USERS_DEPARTMENT',
        'readonly' => '1',
        'presence' => '2',
        'defaultvalue' => '',
        'maximumlength' => '100',
        'sequence' => '2',
        'displaytype' => '2',
        'typeofdata' => 'V~O',
        'quickcreate' => '0',
        'quickcreatesequence' => '1',
        'info_type' => 'BAS',
        'masseditable' => '0',
        'helpinfo' => '',
        'summaryfield' => '0',
        'headerfield' => null,
        'isunique' => '0',
        'editview_sequence' => '2',
        'editview_presence' => '2',
        'columntype' => 'varchar(100)',
        'editview_block_name' => 'LBL_TRACKING_INFOMATION',
        'detailview_block_name' => 'LBL_TRACKING_INFOMATION'
    ),
    'createdtime' => array(
        'columnname' => 'createdtime',
        'tablename' => 'vtiger_crmentity',
        'generatedtype' => '1',
        'uitype' => '70',
        'fieldname' => 'createdtime',
        'fieldlabel' => 'LBL_CREATED_TIME',
        'readonly' => '1',
        'presence' => '2',
        'defaultvalue' => '',
        'maximumlength' => '100',
        'sequence' => '6',
        'displaytype' => '2',
        'typeofdata' => 'DT~O',
        'quickcreate' => '1',
        'quickcreatesequence' => '0',
        'info_type' => 'BAS',
        'masseditable' => '1',
        'helpinfo' => '',
        'summaryfield' => '0',
        'headerfield' => null,
        'isunique' => '0',
        'editview_sequence' => '6',
        'editview_presence' => '2',
        'columntype' => 'datetime',
        'editview_block_name' => 'LBL_GENERAL_INFORMATION',
        'detailview_block_name' => 'LBL_GENERAL_INFORMATION'
    ),
    'modifiedtime' => array(
        'columnname' => 'modifiedtime',
        'tablename' => 'vtiger_crmentity',
        'generatedtype' => '1',
        'uitype' => '70',
        'fieldname' => 'modifiedtime',
        'fieldlabel' => 'LBL_MODIFIED_TIME',
        'readonly' => '1',
        'presence' => '2',
        'defaultvalue' => '',
        'maximumlength' => '100',
        'sequence' => '7',
        'displaytype' => '2',
        'typeofdata' => 'DT~O',
        'quickcreate' => '1',
        'quickcreatesequence' => '0',
        'info_type' => 'BAS',
        'masseditable' => '1',
        'helpinfo' => '',
        'summaryfield' => '0',
        'headerfield' => null,
        'isunique' => '0',
        'editview_sequence' => '7',
        'editview_presence' => '2',
        'columntype' => 'datetime',
        'editview_block_name' => 'LBL_GENERAL_INFORMATION',
        'detailview_block_name' => 'LBL_GENERAL_INFORMATION'
    ),
    'modifiedby' => array(
        'columnname' => 'modifiedby',
        'tablename' => 'vtiger_crmentity',
        'generatedtype' => '1',
        'uitype' => '52',
        'fieldname' => 'modifiedby',
        'fieldlabel' => 'Last Modified By',
        'readonly' => '1',
        'presence' => '2',
        'defaultvalue' => '',
        'maximumlength' => '100',
        'sequence' => '8',
        'displaytype' => '2',
        'typeofdata' => 'V~O',
        'quickcreate' => '1',
        'quickcreatesequence' => '0',
        'info_type' => 'BAS',
        'masseditable' => '1',
        'helpinfo' => '',
        'summaryfield' => '0',
        'headerfield' => null,
        'isunique' => '0',
        'editview_sequence' => '8',
        'editview_presence' => '2',
        'columntype' => 'int',
        'editview_block_name' => 'LBL_GENERAL_INFORMATION',
        'detailview_block_name' => 'LBL_GENERAL_INFORMATION'
    ),
    'source' => array(
        'columnname' => 'source',
        'tablename' => 'vtiger_crmentity',
        'generatedtype' => '1',
        'uitype' => '1',
        'fieldname' => 'source',
        'fieldlabel' => 'LBL_SOURCE_INPUT',
        'readonly' => '1',
        'presence' => '2',
        'defaultvalue' => '',
        'maximumlength' => '100',
        'sequence' => '9',
        'displaytype' => '2',
        'typeofdata' => 'V~O',
        'quickcreate' => '3',
        'quickcreatesequence' => '2',
        'info_type' => 'BAS',
        'masseditable' => '0',
        'helpinfo' => '',
        'summaryfield' => '0',
        'headerfield' => null,
        'isunique' => '0',
        'editview_sequence' => '9',
        'editview_presence' => '2',
        'columntype' => 'varchar(100)',
        'editview_block_name' => 'LBL_GENERAL_INFORMATION',
        'detailview_block_name' => 'LBL_GENERAL_INFORMATION'
    ),
    'starred' => array(
        'columnname' => 'starred',
        'tablename' => 'vtiger_crmentity_user_field',
        'generatedtype' => '1',
        'uitype' => '56',
        'fieldname' => 'starred',
        'fieldlabel' => 'LBL_STARRED',
        'readonly' => '1',
        'presence' => '2',
        'defaultvalue' => '',
        'maximumlength' => '100',
        'sequence' => '10',
        'displaytype' => '6',
        'typeofdata' => 'C~O',
        'quickcreate' => '3',
        'quickcreatesequence' => '3',
        'info_type' => 'BAS',
        'masseditable' => '0',
        'helpinfo' => '',
        'summaryfield' => '0',
        'headerfield' => null,
        'isunique' => '0',
        'editview_sequence' => '10',
        'editview_presence' => '2',
        'columntype' => 'varchar(100)',
        'editview_block_name' => 'LBL_GENERAL_INFORMATION',
        'detailview_block_name' => 'LBL_GENERAL_INFORMATION'
    ),
    'tags' => array(
        'columnname' => 'tags',
        'tablename' => 'vtiger_cpeventmanagement',
        'generatedtype' => '1',
        'uitype' => '1',
        'fieldname' => 'tags',
        'fieldlabel' => 'LBL_TAGS',
        'readonly' => '1',
        'presence' => '2',
        'defaultvalue' => '',
        'maximumlength' => '100',
        'sequence' => '11',
        'displaytype' => '6',
        'typeofdata' => 'V~O',
        'quickcreate' => '3',
        'quickcreatesequence' => '4',
        'info_type' => 'BAS',
        'masseditable' => '0',
        'helpinfo' => '',
        'summaryfield' => '0',
        'headerfield' => null,
        'isunique' => '0',
        'editview_sequence' => '11',
        'editview_presence' => '2',
        'columntype' => 'varchar(1)',
        'editview_block_name' => 'LBL_GENERAL_INFORMATION',
        'detailview_block_name' => 'LBL_GENERAL_INFORMATION'
    )
);

