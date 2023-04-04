<?php

/* System auto-generated on 2021-07-28 03:24:02 pm. DANGER! DO NOT EDIT THIS FILE!!!! */

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
        'sequence' => '4',
        'show_title' => '0',
        'visible' => '0',
        'create_view' => '0',
        'edit_view' => '0',
        'detail_view' => '0',
        'display_status' => '1',
        'iscustom' => '0'
    ),
    'LBL_RELATED_INFORMATION' => array(
        'blocklabel' => 'LBL_RELATED_INFORMATION',
        'sequence' => '2',
        'show_title' => '0',
        'visible' => '0',
        'create_view' => '0',
        'edit_view' => '0',
        'detail_view' => '0',
        'display_status' => '1',
        'iscustom' => '1'
    ),
    'LBL_DISTRIBUTE_INVOICES' => array(
        'blocklabel' => 'LBL_DISTRIBUTE_INVOICES',
        'sequence' => '3',
        'show_title' => '0',
        'visible' => '0',
        'create_view' => '0',
        'edit_view' => '0',
        'detail_view' => '0',
        'display_status' => '1',
        'iscustom' => '1'
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
        'sequence' => '4',
        'show_title' => '0',
        'visible' => '0',
        'create_view' => '0',
        'edit_view' => '0',
        'detail_view' => '0',
        'display_status' => '1',
        'iscustom' => '0'
    ),
    'LBL_RELATED_INFORMATION' => array(
        'blocklabel' => 'LBL_RELATED_INFORMATION',
        'sequence' => '2',
        'show_title' => '0',
        'visible' => '0',
        'create_view' => '0',
        'edit_view' => '0',
        'detail_view' => '0',
        'display_status' => '1',
        'iscustom' => '1'
    ),
    'LBL_DISTRIBUTE_INVOICES' => array(
        'blocklabel' => 'LBL_DISTRIBUTE_INVOICES',
        'sequence' => '3',
        'show_title' => '0',
        'visible' => '0',
        'create_view' => '0',
        'edit_view' => '0',
        'detail_view' => '0',
        'display_status' => '1',
        'iscustom' => '1'
    )
);

$fields = array(
    'name' => array(
        'columnname' => 'name',
        'tablename' => 'vtiger_cppayment',
        'generatedtype' => '1',
        'uitype' => '2',
        'fieldname' => 'name',
        'fieldlabel' => 'LBL_NAME',
        'readonly' => '1',
        'presence' => '2',
        'defaultvalue' => '',
        'maximumlength' => '100',
        'sequence' => '3',
        'displaytype' => '1',
        'typeofdata' => 'V~M',
        'quickcreate' => '2',
        'quickcreatesequence' => '0',
        'info_type' => 'BAS',
        'masseditable' => '1',
        'helpinfo' => '',
        'summaryfield' => '1',
        'headerfield' => '0',
        'isunique' => '0',
        'editview_sequence' => '1',
        'editview_presence' => '2',
        'columntype' => 'varchar(255)',
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
        'sequence' => '6',
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
        'detailview_block_name' => 'LBL_RELATED_INFORMATION'
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
        'sequence' => '13',
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
        'editview_sequence' => '11',
        'editview_presence' => '2',
        'columntype' => 'int(11)',
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
        'sequence' => '2',
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
        'editview_sequence' => '2',
        'editview_presence' => '2',
        'columntype' => 'int(11)',
        'editview_block_name' => 'LBL_TRACKING_INFOMATION',
        'detailview_block_name' => 'LBL_TRACKING_INFOMATION'
    ),
    'createdby' => array(
        'columnname' => 'smcreatorid',
        'tablename' => 'vtiger_crmentity',
        'generatedtype' => '1',
        'uitype' => '52',
        'fieldname' => 'createdby',
        'fieldlabel' => 'LBL_CREATED_BY',
        'readonly' => '1',
        'presence' => '1',
        'defaultvalue' => '',
        'maximumlength' => '100',
        'sequence' => '3',
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
        'editview_sequence' => '3',
        'editview_presence' => '1',
        'columntype' => 'int(11)',
        'editview_block_name' => 'LBL_GENERAL_INFORMATION',
        'detailview_block_name' => 'LBL_GENERAL_INFORMATION'
    ),
    'createdtime' => array(
        'columnname' => 'createdtime',
        'tablename' => 'vtiger_crmentity',
        'generatedtype' => '1',
        'uitype' => '70',
        'fieldname' => 'createdtime',
        'fieldlabel' => 'LBL_CREATED_TIME',
        'readonly' => '1',
        'presence' => '1',
        'defaultvalue' => '',
        'maximumlength' => '100',
        'sequence' => '5',
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
        'editview_sequence' => '4',
        'editview_presence' => '1',
        'columntype' => 'datetime',
        'editview_block_name' => 'LBL_RELATED_INFORMATION',
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
        'presence' => '1',
        'defaultvalue' => '',
        'maximumlength' => '100',
        'sequence' => '8',
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
        'editview_sequence' => '8',
        'editview_presence' => '1',
        'columntype' => 'datetime',
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
        'presence' => '1',
        'defaultvalue' => '',
        'maximumlength' => '100',
        'sequence' => '7',
        'displaytype' => '2',
        'typeofdata' => 'V~O',
        'quickcreate' => '3',
        'quickcreatesequence' => '1',
        'info_type' => 'BAS',
        'masseditable' => '0',
        'helpinfo' => '',
        'summaryfield' => '0',
        'headerfield' => null,
        'isunique' => '0',
        'editview_sequence' => '7',
        'editview_presence' => '1',
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
        'sequence' => '7',
        'displaytype' => '6',
        'typeofdata' => 'C~O',
        'quickcreate' => '3',
        'quickcreatesequence' => '2',
        'info_type' => 'BAS',
        'masseditable' => '0',
        'helpinfo' => '',
        'summaryfield' => '0',
        'headerfield' => null,
        'isunique' => '0',
        'editview_sequence' => '7',
        'editview_presence' => '2',
        'columntype' => 'varchar(100)',
        'editview_block_name' => 'LBL_GENERAL_INFORMATION',
        'detailview_block_name' => 'LBL_GENERAL_INFORMATION'
    ),
    'tags' => array(
        'columnname' => 'tags',
        'tablename' => 'vtiger_cppayment',
        'generatedtype' => '1',
        'uitype' => '1',
        'fieldname' => 'tags',
        'fieldlabel' => 'LBL_TAGS',
        'readonly' => '1',
        'presence' => '2',
        'defaultvalue' => '',
        'maximumlength' => '100',
        'sequence' => '8',
        'displaytype' => '6',
        'typeofdata' => 'V~O',
        'quickcreate' => '3',
        'quickcreatesequence' => '3',
        'info_type' => 'BAS',
        'masseditable' => '0',
        'helpinfo' => '',
        'summaryfield' => '0',
        'headerfield' => null,
        'isunique' => '0',
        'editview_sequence' => '8',
        'editview_presence' => '2',
        'columntype' => 'varchar(1)',
        'editview_block_name' => 'LBL_GENERAL_INFORMATION',
        'detailview_block_name' => 'LBL_GENERAL_INFORMATION'
    ),
    'cppayment_currency' => array(
        'columnname' => 'cppayment_currency',
        'tablename' => 'vtiger_cppayment',
        'generatedtype' => '2',
        'uitype' => '16',
        'fieldname' => 'cppayment_currency',
        'fieldlabel' => 'LBL_CPPAYMENT_CURRENCY',
        'readonly' => '1',
        'presence' => '2',
        'defaultvalue' => '1',
        'maximumlength' => '100',
        'sequence' => '7',
        'displaytype' => '1',
        'typeofdata' => 'V~M',
        'quickcreate' => '2',
        'quickcreatesequence' => '4',
        'info_type' => 'BAS',
        'masseditable' => '1',
        'helpinfo' => '',
        'summaryfield' => '0',
        'headerfield' => '0',
        'isunique' => '0',
        'editview_sequence' => '5',
        'editview_presence' => '2',
        'columntype' => 'varchar(100)',
        'editview_block_name' => 'LBL_GENERAL_INFORMATION',
        'detailview_block_name' => 'LBL_GENERAL_INFORMATION'
    ),
    'cppayment_subcategory' => array(
        'columnname' => 'cppayment_subcategory',
        'tablename' => 'vtiger_cppayment',
        'generatedtype' => '2',
        'uitype' => '16',
        'fieldname' => 'cppayment_subcategory',
        'fieldlabel' => 'LBL_CPPAYMENT_SUBCATEGORY',
        'readonly' => '1',
        'presence' => '2',
        'defaultvalue' => '',
        'maximumlength' => '100',
        'sequence' => '6',
        'displaytype' => '1',
        'typeofdata' => 'V~O',
        'quickcreate' => '1',
        'quickcreatesequence' => '0',
        'info_type' => 'BAS',
        'masseditable' => '1',
        'helpinfo' => '',
        'summaryfield' => '0',
        'headerfield' => '0',
        'isunique' => '0',
        'editview_sequence' => '6',
        'editview_presence' => '2',
        'columntype' => 'varchar(100)',
        'editview_block_name' => 'LBL_GENERAL_INFORMATION',
        'detailview_block_name' => 'LBL_GENERAL_INFORMATION'
    ),
    'cppayment_manager_status' => array(
        'columnname' => 'cppayment_manager_status',
        'tablename' => 'vtiger_cppayment',
        'generatedtype' => '2',
        'uitype' => '16',
        'fieldname' => 'cppayment_manager_status',
        'fieldlabel' => 'LBL_CPPAYMENT_MANAGER_STATUS',
        'readonly' => '1',
        'presence' => '2',
        'defaultvalue' => 'not_approved',
        'maximumlength' => '100',
        'sequence' => '16',
        'displaytype' => '1',
        'typeofdata' => 'V~O',
        'quickcreate' => '1',
        'quickcreatesequence' => '0',
        'info_type' => 'BAS',
        'masseditable' => '1',
        'helpinfo' => '',
        'summaryfield' => '0',
        'headerfield' => '0',
        'isunique' => '0',
        'editview_sequence' => '15',
        'editview_presence' => '1',
        'columntype' => 'varchar(100)',
        'editview_block_name' => 'LBL_GENERAL_INFORMATION',
        'detailview_block_name' => 'LBL_GENERAL_INFORMATION'
    ),
    'cppayment_leader_status' => array(
        'columnname' => 'cppayment_leader_status',
        'tablename' => 'vtiger_cppayment',
        'generatedtype' => '2',
        'uitype' => '16',
        'fieldname' => 'cppayment_leader_status',
        'fieldlabel' => 'LBL_CPPAYMENT_LEADER_STATUS',
        'readonly' => '1',
        'presence' => '2',
        'defaultvalue' => 'not_approved',
        'maximumlength' => '100',
        'sequence' => '14',
        'displaytype' => '1',
        'typeofdata' => 'V~O',
        'quickcreate' => '1',
        'quickcreatesequence' => '0',
        'info_type' => 'BAS',
        'masseditable' => '1',
        'helpinfo' => '',
        'summaryfield' => '0',
        'headerfield' => '0',
        'isunique' => '0',
        'editview_sequence' => '16',
        'editview_presence' => '1',
        'columntype' => 'varchar(100)',
        'editview_block_name' => 'LBL_GENERAL_INFORMATION',
        'detailview_block_name' => 'LBL_GENERAL_INFORMATION'
    ),
    'cppayment_status' => array(
        'columnname' => 'cppayment_status',
        'tablename' => 'vtiger_cppayment',
        'generatedtype' => '2',
        'uitype' => '16',
        'fieldname' => 'cppayment_status',
        'fieldlabel' => 'LBL_CPPAYMENT_STATUS',
        'readonly' => '1',
        'presence' => '2',
        'defaultvalue' => 'not_completed',
        'maximumlength' => '100',
        'sequence' => '2',
        'displaytype' => '1',
        'typeofdata' => 'V~O',
        'quickcreate' => '1',
        'quickcreatesequence' => '0',
        'info_type' => 'BAS',
        'masseditable' => '1',
        'helpinfo' => 'Chỉ phiếu chi c&oacute; t&igrave;nh trạng l&agrave; &quot;Đ&atilde; chi&quot; th&igrave; mới được t&iacute;nh v&agrave;o b&aacute;o c&aacute;o chi ph&iacute; li&ecirc;n quan. 
Lưu &yacute;: chỉ chỉnh sửa được phiếu chi c&oacute; t&igrave;nh trạng l&agrave; &quot;Chưa chi&quot;',
        'summaryfield' => '0',
        'headerfield' => '0',
        'isunique' => '0',
        'editview_sequence' => '2',
        'editview_presence' => '2',
        'columntype' => 'varchar(100)',
        'editview_block_name' => 'LBL_GENERAL_INFORMATION',
        'detailview_block_name' => 'LBL_GENERAL_INFORMATION'
    ),
    'expiry_date' => array(
        'columnname' => 'expiry_date',
        'tablename' => 'vtiger_cppayment',
        'generatedtype' => '2',
        'uitype' => '5',
        'fieldname' => 'expiry_date',
        'fieldlabel' => 'LBL_EXPIRY_DATE',
        'readonly' => '1',
        'presence' => '2',
        'defaultvalue' => '',
        'maximumlength' => '100',
        'sequence' => '8',
        'displaytype' => '1',
        'typeofdata' => 'D~O',
        'quickcreate' => '2',
        'quickcreatesequence' => '5',
        'info_type' => 'BAS',
        'masseditable' => '1',
        'helpinfo' => '',
        'summaryfield' => '1',
        'headerfield' => '0',
        'isunique' => '0',
        'editview_sequence' => '8',
        'editview_presence' => '2',
        'columntype' => 'varchar(100)',
        'editview_block_name' => 'LBL_GENERAL_INFORMATION',
        'detailview_block_name' => 'LBL_GENERAL_INFORMATION'
    ),
    'paid_date' => array(
        'columnname' => 'paid_date',
        'tablename' => 'vtiger_cppayment',
        'generatedtype' => '2',
        'uitype' => '5',
        'fieldname' => 'paid_date',
        'fieldlabel' => 'LBL_PAID_DATE',
        'readonly' => '1',
        'presence' => '2',
        'defaultvalue' => '',
        'maximumlength' => '100',
        'sequence' => '10',
        'displaytype' => '1',
        'typeofdata' => 'D~O',
        'quickcreate' => '2',
        'quickcreatesequence' => '6',
        'info_type' => 'BAS',
        'masseditable' => '1',
        'helpinfo' => '',
        'summaryfield' => '1',
        'headerfield' => '0',
        'isunique' => '0',
        'editview_sequence' => '10',
        'editview_presence' => '2',
        'columntype' => 'varchar(100)',
        'editview_block_name' => 'LBL_GENERAL_INFORMATION',
        'detailview_block_name' => 'LBL_GENERAL_INFORMATION'
    ),
    'amount' => array(
        'columnname' => 'amount',
        'tablename' => 'vtiger_cppayment',
        'generatedtype' => '2',
        'uitype' => '71',
        'fieldname' => 'amount',
        'fieldlabel' => 'LBL_AMOUNT',
        'readonly' => '1',
        'presence' => '2',
        'defaultvalue' => '',
        'maximumlength' => '100',
        'sequence' => '5',
        'displaytype' => '1',
        'typeofdata' => 'N~M',
        'quickcreate' => '2',
        'quickcreatesequence' => '7',
        'info_type' => 'BAS',
        'masseditable' => '1',
        'helpinfo' => '',
        'summaryfield' => '1',
        'headerfield' => '0',
        'isunique' => '0',
        'editview_sequence' => '3',
        'editview_presence' => '2',
        'columntype' => 'decimal(25,8)',
        'editview_block_name' => 'LBL_GENERAL_INFORMATION',
        'detailview_block_name' => 'LBL_GENERAL_INFORMATION'
    ),
    'currency_ratio' => array(
        'columnname' => 'currency_ratio',
        'tablename' => 'vtiger_cppayment',
        'generatedtype' => '2',
        'uitype' => '7',
        'fieldname' => 'currency_ratio',
        'fieldlabel' => 'LBL_CURRENCY_RATIO',
        'readonly' => '1',
        'presence' => '2',
        'defaultvalue' => '',
        'maximumlength' => '100',
        'sequence' => '9',
        'displaytype' => '1',
        'typeofdata' => 'NN~O',
        'quickcreate' => '1',
        'quickcreatesequence' => '0',
        'info_type' => 'BAS',
        'masseditable' => '1',
        'helpinfo' => 'L&agrave; tỷ lệ chuyển đổi của tiền kh&aacute;c so với tiền mặc định (VNĐ)',
        'summaryfield' => '0',
        'headerfield' => '0',
        'isunique' => '0',
        'editview_sequence' => '7',
        'editview_presence' => '2',
        'columntype' => 'varchar(100)',
        'editview_block_name' => 'LBL_GENERAL_INFORMATION',
        'detailview_block_name' => 'LBL_GENERAL_INFORMATION'
    ),
    'code' => array(
        'columnname' => 'code',
        'tablename' => 'vtiger_cppayment',
        'generatedtype' => '2',
        'uitype' => '4',
        'fieldname' => 'code',
        'fieldlabel' => 'LBL_CODE',
        'readonly' => '1',
        'presence' => '2',
        'defaultvalue' => '',
        'maximumlength' => '100',
        'sequence' => '1',
        'displaytype' => '1',
        'typeofdata' => 'V~O~LE~15',
        'quickcreate' => '1',
        'quickcreatesequence' => '0',
        'info_type' => 'BAS',
        'masseditable' => '1',
        'helpinfo' => '',
        'summaryfield' => '0',
        'headerfield' => '0',
        'isunique' => '0',
        'editview_sequence' => '4',
        'editview_presence' => '1',
        'columntype' => 'varchar(100)',
        'editview_block_name' => 'LBL_RELATED_INFORMATION',
        'detailview_block_name' => 'LBL_GENERAL_INFORMATION'
    ),
    'amount_vnd' => array(
        'columnname' => 'amount_vnd',
        'tablename' => 'vtiger_cppayment',
        'generatedtype' => '2',
        'uitype' => '71',
        'fieldname' => 'amount_vnd',
        'fieldlabel' => 'LBL_AMOUNT_VND',
        'readonly' => '1',
        'presence' => '2',
        'defaultvalue' => '',
        'maximumlength' => '100',
        'sequence' => '11',
        'displaytype' => '1',
        'typeofdata' => 'N~O',
        'quickcreate' => '1',
        'quickcreatesequence' => '0',
        'info_type' => 'BAS',
        'masseditable' => '1',
        'helpinfo' => '',
        'summaryfield' => '0',
        'headerfield' => '0',
        'isunique' => '0',
        'editview_sequence' => '9',
        'editview_presence' => '2',
        'columntype' => 'decimal(25,8)',
        'editview_block_name' => 'LBL_GENERAL_INFORMATION',
        'detailview_block_name' => 'LBL_GENERAL_INFORMATION'
    ),
    'accountant_id' => array(
        'columnname' => 'accountant_id',
        'tablename' => 'vtiger_cppayment',
        'generatedtype' => '2',
        'uitype' => '1',
        'fieldname' => 'accountant_id',
        'fieldlabel' => 'LBL_ACCOUNTANT_ID',
        'readonly' => '1',
        'presence' => '1',
        'defaultvalue' => '',
        'maximumlength' => '100',
        'sequence' => '6',
        'displaytype' => '1',
        'typeofdata' => 'V~O~LE~25',
        'quickcreate' => '1',
        'quickcreatesequence' => '0',
        'info_type' => 'BAS',
        'masseditable' => '1',
        'helpinfo' => '',
        'summaryfield' => '0',
        'headerfield' => '0',
        'isunique' => '0',
        'editview_sequence' => '17',
        'editview_presence' => '1',
        'columntype' => 'varchar(100)',
        'editview_block_name' => 'LBL_GENERAL_INFORMATION',
        'detailview_block_name' => 'LBL_RELATED_INFORMATION'
    ),
    'leader_id' => array(
        'columnname' => 'leader_id',
        'tablename' => 'vtiger_cppayment',
        'generatedtype' => '2',
        'uitype' => '1',
        'fieldname' => 'leader_id',
        'fieldlabel' => 'LBL_LEADER_ID',
        'readonly' => '1',
        'presence' => '1',
        'defaultvalue' => '',
        'maximumlength' => '100',
        'sequence' => '4',
        'displaytype' => '1',
        'typeofdata' => 'V~O~LE~25',
        'quickcreate' => '1',
        'quickcreatesequence' => '0',
        'info_type' => 'BAS',
        'masseditable' => '1',
        'helpinfo' => '',
        'summaryfield' => '0',
        'headerfield' => '0',
        'isunique' => '0',
        'editview_sequence' => '4',
        'editview_presence' => '1',
        'columntype' => 'varchar(100)',
        'editview_block_name' => 'LBL_RELATED_INFORMATION',
        'detailview_block_name' => null
    ),
    'manager_id' => array(
        'columnname' => 'manager_id',
        'tablename' => 'vtiger_cppayment',
        'generatedtype' => '2',
        'uitype' => '1',
        'fieldname' => 'manager_id',
        'fieldlabel' => 'LBL_MANAGER_ID',
        'readonly' => '1',
        'presence' => '1',
        'defaultvalue' => '',
        'maximumlength' => '100',
        'sequence' => '19',
        'displaytype' => '1',
        'typeofdata' => 'V~O~LE~25',
        'quickcreate' => '1',
        'quickcreatesequence' => '0',
        'info_type' => 'BAS',
        'masseditable' => '1',
        'helpinfo' => '',
        'summaryfield' => '0',
        'headerfield' => '0',
        'isunique' => '0',
        'editview_sequence' => '19',
        'editview_presence' => '1',
        'columntype' => 'varchar(100)',
        'editview_block_name' => 'LBL_GENERAL_INFORMATION',
        'detailview_block_name' => 'LBL_GENERAL_INFORMATION'
    ),
    'asset_account_id' => array(
        'columnname' => 'asset_account_id',
        'tablename' => 'vtiger_cppayment',
        'generatedtype' => '1',
        'uitype' => '10',
        'fieldname' => 'asset_account_id',
        'fieldlabel' => 'LBL_ASSET_ACCPOUNT',
        'readonly' => '1',
        'presence' => '2',
        'defaultvalue' => '',
        'maximumlength' => '100',
        'sequence' => '15',
        'displaytype' => '1',
        'typeofdata' => 'V~O',
        'quickcreate' => '1',
        'quickcreatesequence' => '0',
        'info_type' => 'BAS',
        'masseditable' => '1',
        'helpinfo' => 'T&agrave;i khoản ng&acirc;n h&agrave;ng bị trừ tiền khi chi',
        'summaryfield' => '0',
        'headerfield' => '0',
        'isunique' => '0',
        'editview_sequence' => '12',
        'editview_presence' => '2',
        'columntype' => 'varchar(100)',
        'editview_block_name' => 'LBL_GENERAL_INFORMATION',
        'detailview_block_name' => 'LBL_GENERAL_INFORMATION'
    ),
    'contact_id' => array(
        'columnname' => 'contact_id',
        'tablename' => 'vtiger_cppayment',
        'generatedtype' => '1',
        'uitype' => '10',
        'fieldname' => 'contact_id',
        'fieldlabel' => 'LBL_CONTACT',
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
        'columntype' => 'varchar(100)',
        'editview_block_name' => 'LBL_RELATED_INFORMATION',
        'detailview_block_name' => 'LBL_RELATED_INFORMATION'
    ),
    'account_id' => array(
        'columnname' => 'account_id',
        'tablename' => 'vtiger_cppayment',
        'generatedtype' => '1',
        'uitype' => '10',
        'fieldname' => 'account_id',
        'fieldlabel' => 'LBL_ACCOUNT',
        'readonly' => '1',
        'presence' => '2',
        'defaultvalue' => '',
        'maximumlength' => '100',
        'sequence' => '3',
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
        'editview_sequence' => '3',
        'editview_presence' => '2',
        'columntype' => 'varchar(100)',
        'editview_block_name' => 'LBL_RELATED_INFORMATION',
        'detailview_block_name' => 'LBL_RELATED_INFORMATION'
    ),
    'vendor_id' => array(
        'columnname' => 'vendor_id',
        'tablename' => 'vtiger_cppayment',
        'generatedtype' => '1',
        'uitype' => '10',
        'fieldname' => 'vendor_id',
        'fieldlabel' => 'LBL_VENDOR',
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
        'summaryfield' => '0',
        'headerfield' => null,
        'isunique' => '0',
        'editview_sequence' => '1',
        'editview_presence' => '2',
        'columntype' => 'varchar(100)',
        'editview_block_name' => 'LBL_RELATED_INFORMATION',
        'detailview_block_name' => 'LBL_RELATED_INFORMATION'
    ),
    'cppayment_category' => array(
        'columnname' => 'cppayment_category',
        'tablename' => 'vtiger_cppayment',
        'generatedtype' => '2',
        'uitype' => '16',
        'fieldname' => 'cppayment_category',
        'fieldlabel' => 'LBL_CPPAYMENT_CATEGORY',
        'readonly' => '1',
        'presence' => '2',
        'defaultvalue' => '',
        'maximumlength' => '100',
        'sequence' => '4',
        'displaytype' => '1',
        'typeofdata' => 'V~M',
        'quickcreate' => '1',
        'quickcreatesequence' => '0',
        'info_type' => 'BAS',
        'masseditable' => '1',
        'helpinfo' => '',
        'summaryfield' => '0',
        'headerfield' => '0',
        'isunique' => '0',
        'editview_sequence' => '4',
        'editview_presence' => '2',
        'columntype' => 'varchar(100)',
        'editview_block_name' => 'LBL_GENERAL_INFORMATION',
        'detailview_block_name' => 'LBL_GENERAL_INFORMATION'
    ),
    'invoices_detail' => array(
        'columnname' => 'invoices_detail',
        'tablename' => 'vtiger_cppayment',
        'generatedtype' => '2',
        'uitype' => '21',
        'fieldname' => 'invoices_detail',
        'fieldlabel' => 'LBL_INVOICES_DETAIL',
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
        'helpinfo' => 'Ph&acirc;n bổ khoản chi n&agrave;y cho c&aacute;c h&oacute;a đơn được chọn. Lưu &yacute;: nếu bạn chưa chọn th&ocirc;ng tin cho trường Nh&agrave; cung cấp th&igrave; khi chọn h&oacute;a đơn, th&ocirc;ng tin về nh&agrave; cung cấp, người li&ecirc;n hệ sẽ được tự động điền v&agrave;o) 
Ph&acirc;n bổ tự động: hệ thống tự động t&iacute;nh to&aacute;n số tiền cho c&aacute;c h&oacute;a đơn trong danh s&aacute;ch h&oacute;a đơn của phiếu chi n&agrave;y.',
        'summaryfield' => '0',
        'headerfield' => '0',
        'isunique' => '0',
        'editview_sequence' => '1',
        'editview_presence' => '2',
        'columntype' => 'varchar(100)',
        'editview_block_name' => 'LBL_DISTRIBUTE_INVOICES',
        'detailview_block_name' => 'LBL_DISTRIBUTE_INVOICES'
    ),
    'related_salesorder' => array(
        'columnname' => 'related_salesorder',
        'tablename' => 'vtiger_cppayment',
        'generatedtype' => '1',
        'uitype' => '10',
        'fieldname' => 'related_salesorder',
        'fieldlabel' => 'SalesOrder',
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
        'summaryfield' => '0',
        'headerfield' => null,
        'isunique' => '0',
        'editview_sequence' => '2',
        'editview_presence' => '2',
        'columntype' => 'varchar(100)',
        'editview_block_name' => 'LBL_RELATED_INFORMATION',
        'detailview_block_name' => 'LBL_RELATED_INFORMATION'
    ),
    'related_purchaseorder' => array(
        'columnname' => 'related_purchaseorder',
        'tablename' => 'vtiger_cppayment',
        'generatedtype' => '1',
        'uitype' => '10',
        'fieldname' => 'related_purchaseorder',
        'fieldlabel' => 'PurchaseOrder',
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
        'columntype' => 'varchar(100)',
        'editview_block_name' => 'LBL_RELATED_INFORMATION',
        'detailview_block_name' => 'LBL_RELATED_INFORMATION'
    ),
    'cppayment_accountant_status' => array(
        'columnname' => 'cppayment_accountant_status',
        'tablename' => 'vtiger_cppayment',
        'generatedtype' => '2',
        'uitype' => '16',
        'fieldname' => 'cppayment_accountant_status',
        'fieldlabel' => 'LBL_CPPAYMENT_ACCOUNTANT_STATUS',
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
        'masseditable' => '2',
        'helpinfo' => '',
        'summaryfield' => '0',
        'headerfield' => '0',
        'isunique' => '0',
        'editview_sequence' => '6',
        'editview_presence' => '1',
        'columntype' => 'varchar(100)',
        'editview_block_name' => 'LBL_RELATED_INFORMATION',
        'detailview_block_name' => 'LBL_GENERAL_INFORMATION'
    ),
    'related_servicecontract' => array(
        'columnname' => 'related_servicecontract',
        'tablename' => 'vtiger_cppayment',
        'generatedtype' => '1',
        'uitype' => '10',
        'fieldname' => 'related_servicecontract',
        'fieldlabel' => 'Service Contracts',
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
        'summaryfield' => '0',
        'headerfield' => null,
        'isunique' => '0',
        'editview_sequence' => '6',
        'editview_presence' => '2',
        'columntype' => 'varchar(100)',
        'editview_block_name' => 'LBL_RELATED_INFORMATION',
        'detailview_block_name' => 'LBL_TRACKING_INFOMATION'
    ),
    'cppayment_step' => array(
        'columnname' => 'cppayment_step',
        'tablename' => 'vtiger_cppayment',
        'generatedtype' => '2',
        'uitype' => '16',
        'fieldname' => 'cppayment_step',
        'fieldlabel' => 'LBL_CPPAYMENT_STEP',
        'readonly' => '1',
        'presence' => '1',
        'defaultvalue' => '',
        'maximumlength' => '100',
        'sequence' => '1',
        'displaytype' => '1',
        'typeofdata' => 'V~O',
        'quickcreate' => '1',
        'quickcreatesequence' => '0',
        'info_type' => 'BAS',
        'masseditable' => '2',
        'helpinfo' => '',
        'summaryfield' => '0',
        'headerfield' => '0',
        'isunique' => '0',
        'editview_sequence' => '1',
        'editview_presence' => '1',
        'columntype' => 'varchar(100)',
        'editview_block_name' => 'LBL_GENERAL_INFORMATION',
        'detailview_block_name' => 'LBL_GENERAL_INFORMATION'
    ),
    'users_department' => array(
        'columnname' => 'users_department',
        'tablename' => 'vtiger_cppayment',
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
        'detailview_block_name' => 'LBL_GENERAL_INFORMATION'
    )
);

