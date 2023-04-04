<?php

/* System auto-generated on 2021-07-28 03:24:01 pm. DANGER! DO NOT EDIT THIS FILE!!!! */

$editViewBlocks = array(
    'LBL_PRICEBOOK_INFORMATION' => array(
        'blocklabel' => 'LBL_PRICEBOOK_INFORMATION',
        'sequence' => '1',
        'show_title' => '0',
        'visible' => '0',
        'create_view' => '0',
        'edit_view' => '0',
        'detail_view' => '0',
        'display_status' => '1',
        'iscustom' => '0'
    ),
    'LBL_CUSTOM_INFORMATION' => array(
        'blocklabel' => 'LBL_CUSTOM_INFORMATION',
        'sequence' => '2',
        'show_title' => '0',
        'visible' => '0',
        'create_view' => '0',
        'edit_view' => '0',
        'detail_view' => '0',
        'display_status' => '1',
        'iscustom' => '0'
    ),
    'LBL_DESCRIPTION_INFORMATION' => array(
        'blocklabel' => 'LBL_DESCRIPTION_INFORMATION',
        'sequence' => '3',
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
    'LBL_PRICEBOOK_INFORMATION' => array(
        'blocklabel' => 'LBL_PRICEBOOK_INFORMATION',
        'sequence' => '1',
        'show_title' => '0',
        'visible' => '0',
        'create_view' => '0',
        'edit_view' => '0',
        'detail_view' => '0',
        'display_status' => '1',
        'iscustom' => '0'
    ),
    'LBL_CUSTOM_INFORMATION' => array(
        'blocklabel' => 'LBL_CUSTOM_INFORMATION',
        'sequence' => '2',
        'show_title' => '0',
        'visible' => '0',
        'create_view' => '0',
        'edit_view' => '0',
        'detail_view' => '0',
        'display_status' => '1',
        'iscustom' => '0'
    ),
    'LBL_DESCRIPTION_INFORMATION' => array(
        'blocklabel' => 'LBL_DESCRIPTION_INFORMATION',
        'sequence' => '3',
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
    'bookname' => array(
        'columnname' => 'bookname',
        'tablename' => 'vtiger_pricebook',
        'generatedtype' => '1',
        'uitype' => '2',
        'fieldname' => 'bookname',
        'fieldlabel' => 'Price Book Name',
        'readonly' => '1',
        'presence' => '0',
        'defaultvalue' => '',
        'maximumlength' => '100',
        'sequence' => '1',
        'displaytype' => '1',
        'typeofdata' => 'V~M',
        'quickcreate' => '0',
        'quickcreatesequence' => '1',
        'info_type' => 'BAS',
        'masseditable' => '2',
        'helpinfo' => null,
        'summaryfield' => '1',
        'headerfield' => '0',
        'isunique' => '0',
        'editview_sequence' => '1',
        'editview_presence' => '0',
        'columntype' => 'varchar(100)',
        'editview_block_name' => 'LBL_PRICEBOOK_INFORMATION',
        'detailview_block_name' => 'LBL_PRICEBOOK_INFORMATION'
    ),
    'pricebook_no' => array(
        'columnname' => 'pricebook_no',
        'tablename' => 'vtiger_pricebook',
        'generatedtype' => '1',
        'uitype' => '4',
        'fieldname' => 'pricebook_no',
        'fieldlabel' => 'PriceBook No',
        'readonly' => '1',
        'presence' => '0',
        'defaultvalue' => '',
        'maximumlength' => '100',
        'sequence' => '3',
        'displaytype' => '1',
        'typeofdata' => 'V~O',
        'quickcreate' => '3',
        'quickcreatesequence' => null,
        'info_type' => 'BAS',
        'masseditable' => '0',
        'helpinfo' => null,
        'summaryfield' => '0',
        'headerfield' => '0',
        'isunique' => '0',
        'editview_sequence' => '3',
        'editview_presence' => '0',
        'columntype' => 'varchar(100)',
        'editview_block_name' => 'LBL_PRICEBOOK_INFORMATION',
        'detailview_block_name' => 'LBL_PRICEBOOK_INFORMATION'
    ),
    'active' => array(
        'columnname' => 'active',
        'tablename' => 'vtiger_pricebook',
        'generatedtype' => '1',
        'uitype' => '56',
        'fieldname' => 'active',
        'fieldlabel' => 'Active',
        'readonly' => '1',
        'presence' => '2',
        'defaultvalue' => '',
        'maximumlength' => '100',
        'sequence' => '2',
        'displaytype' => '1',
        'typeofdata' => 'C~O',
        'quickcreate' => '2',
        'quickcreatesequence' => '2',
        'info_type' => 'BAS',
        'masseditable' => '2',
        'helpinfo' => null,
        'summaryfield' => '1',
        'headerfield' => '0',
        'isunique' => '0',
        'editview_sequence' => '2',
        'editview_presence' => '2',
        'columntype' => 'int(11)',
        'editview_block_name' => 'LBL_PRICEBOOK_INFORMATION',
        'detailview_block_name' => 'LBL_PRICEBOOK_INFORMATION'
    ),
    'createdtime' => array(
        'columnname' => 'createdtime',
        'tablename' => 'vtiger_crmentity',
        'generatedtype' => '1',
        'uitype' => '70',
        'fieldname' => 'createdtime',
        'fieldlabel' => 'Created Time',
        'readonly' => '1',
        'presence' => '0',
        'defaultvalue' => '',
        'maximumlength' => '100',
        'sequence' => '4',
        'displaytype' => '2',
        'typeofdata' => 'DT~O',
        'quickcreate' => '3',
        'quickcreatesequence' => null,
        'info_type' => 'BAS',
        'masseditable' => '0',
        'helpinfo' => null,
        'summaryfield' => '0',
        'headerfield' => '0',
        'isunique' => '0',
        'editview_sequence' => '4',
        'editview_presence' => '0',
        'columntype' => 'datetime',
        'editview_block_name' => 'LBL_PRICEBOOK_INFORMATION',
        'detailview_block_name' => 'LBL_PRICEBOOK_INFORMATION'
    ),
    'modifiedtime' => array(
        'columnname' => 'modifiedtime',
        'tablename' => 'vtiger_crmentity',
        'generatedtype' => '1',
        'uitype' => '70',
        'fieldname' => 'modifiedtime',
        'fieldlabel' => 'Modified Time',
        'readonly' => '1',
        'presence' => '0',
        'defaultvalue' => '',
        'maximumlength' => '100',
        'sequence' => '5',
        'displaytype' => '2',
        'typeofdata' => 'DT~O',
        'quickcreate' => '3',
        'quickcreatesequence' => null,
        'info_type' => 'BAS',
        'masseditable' => '0',
        'helpinfo' => null,
        'summaryfield' => '0',
        'headerfield' => '0',
        'isunique' => '0',
        'editview_sequence' => '5',
        'editview_presence' => '0',
        'columntype' => 'datetime',
        'editview_block_name' => 'LBL_PRICEBOOK_INFORMATION',
        'detailview_block_name' => 'LBL_PRICEBOOK_INFORMATION'
    ),
    'currency_id' => array(
        'columnname' => 'currency_id',
        'tablename' => 'vtiger_pricebook',
        'generatedtype' => '1',
        'uitype' => '117',
        'fieldname' => 'currency_id',
        'fieldlabel' => 'Currency',
        'readonly' => '1',
        'presence' => '0',
        'defaultvalue' => '',
        'maximumlength' => '100',
        'sequence' => '5',
        'displaytype' => '1',
        'typeofdata' => 'I~M',
        'quickcreate' => '0',
        'quickcreatesequence' => '3',
        'info_type' => 'BAS',
        'masseditable' => '0',
        'helpinfo' => null,
        'summaryfield' => '0',
        'headerfield' => '0',
        'isunique' => '0',
        'editview_sequence' => '5',
        'editview_presence' => '0',
        'columntype' => 'int(11)',
        'editview_block_name' => 'LBL_PRICEBOOK_INFORMATION',
        'detailview_block_name' => 'LBL_PRICEBOOK_INFORMATION'
    ),
    'modifiedby' => array(
        'columnname' => 'modifiedby',
        'tablename' => 'vtiger_crmentity',
        'generatedtype' => '1',
        'uitype' => '52',
        'fieldname' => 'modifiedby',
        'fieldlabel' => 'Last Modified By',
        'readonly' => '1',
        'presence' => '0',
        'defaultvalue' => '',
        'maximumlength' => '100',
        'sequence' => '7',
        'displaytype' => '2',
        'typeofdata' => 'V~O',
        'quickcreate' => '3',
        'quickcreatesequence' => null,
        'info_type' => 'BAS',
        'masseditable' => '0',
        'helpinfo' => null,
        'summaryfield' => '0',
        'headerfield' => '0',
        'isunique' => '0',
        'editview_sequence' => '7',
        'editview_presence' => '0',
        'columntype' => 'int(11)',
        'editview_block_name' => 'LBL_PRICEBOOK_INFORMATION',
        'detailview_block_name' => 'LBL_PRICEBOOK_INFORMATION'
    ),
    'description' => array(
        'columnname' => 'description',
        'tablename' => 'vtiger_crmentity',
        'generatedtype' => '1',
        'uitype' => '19',
        'fieldname' => 'description',
        'fieldlabel' => 'Description',
        'readonly' => '1',
        'presence' => '2',
        'defaultvalue' => '',
        'maximumlength' => '100',
        'sequence' => '1',
        'displaytype' => '1',
        'typeofdata' => 'V~O',
        'quickcreate' => '1',
        'quickcreatesequence' => null,
        'info_type' => 'BAS',
        'masseditable' => '2',
        'helpinfo' => null,
        'summaryfield' => '0',
        'headerfield' => '0',
        'isunique' => '0',
        'editview_sequence' => '1',
        'editview_presence' => '2',
        'columntype' => 'mediumtext',
        'editview_block_name' => 'LBL_DESCRIPTION_INFORMATION',
        'detailview_block_name' => 'LBL_DESCRIPTION_INFORMATION'
    ),
    'source' => array(
        'columnname' => 'source',
        'tablename' => 'vtiger_crmentity',
        'generatedtype' => '1',
        'uitype' => '1',
        'fieldname' => 'source',
        'fieldlabel' => 'Source',
        'readonly' => '1',
        'presence' => '2',
        'defaultvalue' => '',
        'maximumlength' => '100',
        'sequence' => '8',
        'displaytype' => '2',
        'typeofdata' => 'V~O',
        'quickcreate' => '3',
        'quickcreatesequence' => '4',
        'info_type' => 'BAS',
        'masseditable' => '0',
        'helpinfo' => '',
        'summaryfield' => '0',
        'headerfield' => null,
        'isunique' => '0',
        'editview_sequence' => '8',
        'editview_presence' => '2',
        'columntype' => 'varchar(100)',
        'editview_block_name' => 'LBL_PRICEBOOK_INFORMATION',
        'detailview_block_name' => 'LBL_PRICEBOOK_INFORMATION'
    ),
    'starred' => array(
        'columnname' => 'starred',
        'tablename' => 'vtiger_crmentity_user_field',
        'generatedtype' => '1',
        'uitype' => '56',
        'fieldname' => 'starred',
        'fieldlabel' => 'starred',
        'readonly' => '1',
        'presence' => '2',
        'defaultvalue' => '',
        'maximumlength' => '100',
        'sequence' => '9',
        'displaytype' => '6',
        'typeofdata' => 'C~O',
        'quickcreate' => '3',
        'quickcreatesequence' => '5',
        'info_type' => 'BAS',
        'masseditable' => '0',
        'helpinfo' => '',
        'summaryfield' => '0',
        'headerfield' => null,
        'isunique' => '0',
        'editview_sequence' => '9',
        'editview_presence' => '2',
        'columntype' => 'varchar(100)',
        'editview_block_name' => 'LBL_PRICEBOOK_INFORMATION',
        'detailview_block_name' => 'LBL_PRICEBOOK_INFORMATION'
    ),
    'tags' => array(
        'columnname' => 'tags',
        'tablename' => 'vtiger_pricebook',
        'generatedtype' => '1',
        'uitype' => '1',
        'fieldname' => 'tags',
        'fieldlabel' => 'tags',
        'readonly' => '1',
        'presence' => '2',
        'defaultvalue' => '',
        'maximumlength' => '100',
        'sequence' => '10',
        'displaytype' => '6',
        'typeofdata' => 'V~O',
        'quickcreate' => '3',
        'quickcreatesequence' => '6',
        'info_type' => 'BAS',
        'masseditable' => '0',
        'helpinfo' => '',
        'summaryfield' => '0',
        'headerfield' => null,
        'isunique' => '0',
        'editview_sequence' => '10',
        'editview_presence' => '2',
        'columntype' => 'varchar(1)',
        'editview_block_name' => 'LBL_PRICEBOOK_INFORMATION',
        'detailview_block_name' => 'LBL_PRICEBOOK_INFORMATION'
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
        'sequence' => '11',
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
        'editview_sequence' => '11',
        'editview_presence' => '1',
        'columntype' => 'int(11)',
        'editview_block_name' => 'LBL_PRICEBOOK_INFORMATION',
        'detailview_block_name' => 'LBL_PRICEBOOK_INFORMATION'
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
        'sequence' => '12',
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
        'editview_sequence' => '12',
        'editview_presence' => '2',
        'columntype' => 'int(11)',
        'editview_block_name' => 'LBL_PRICEBOOK_INFORMATION',
        'detailview_block_name' => 'LBL_PRICEBOOK_INFORMATION'
    ),
    'users_department' => array(
        'columnname' => 'users_department',
        'tablename' => 'vtiger_pricebook',
        'generatedtype' => '1',
        'uitype' => '16',
        'fieldname' => 'users_department',
        'fieldlabel' => 'LBL_USERS_DEPARTMENT',
        'readonly' => '1',
        'presence' => '0',
        'defaultvalue' => '',
        'maximumlength' => '100',
        'sequence' => '99',
        'displaytype' => '2',
        'typeofdata' => 'V~O',
        'quickcreate' => '1',
        'quickcreatesequence' => '0',
        'info_type' => 'BAS',
        'masseditable' => '0',
        'helpinfo' => null,
        'summaryfield' => '0',
        'headerfield' => '0',
        'isunique' => '0',
        'editview_sequence' => '3',
        'editview_presence' => '1',
        'columntype' => 'varchar(100)',
        'editview_block_name' => null,
        'detailview_block_name' => 'LBL_PRICEBOOK_INFORMATION'
    )
);

