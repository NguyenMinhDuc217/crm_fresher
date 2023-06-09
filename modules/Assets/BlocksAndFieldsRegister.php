<?php

/* System auto-generated on 2021-07-28 03:24:02 pm. DANGER! DO NOT EDIT THIS FILE!!!! */

$editViewBlocks = array(
    'LBL_ASSET_INFORMATION' => array(
        'blocklabel' => 'LBL_ASSET_INFORMATION',
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
        'sequence' => '3',
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
        'sequence' => '4',
        'show_title' => '0',
        'visible' => '0',
        'create_view' => '0',
        'edit_view' => '0',
        'detail_view' => '0',
        'display_status' => '1',
        'iscustom' => '0'
    ),
    'LBL_MANAGEMENT_INFORMATION' => array(
        'blocklabel' => 'LBL_MANAGEMENT_INFORMATION',
        'sequence' => '2',
        'show_title' => '0',
        'visible' => '0',
        'create_view' => '0',
        'edit_view' => '0',
        'detail_view' => '0',
        'display_status' => '1',
        'iscustom' => '1'
    ),
    'LBL_SYSTEM_INFORMATION' => array(
        'blocklabel' => 'LBL_SYSTEM_INFORMATION',
        'sequence' => '5',
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
    'LBL_ASSET_INFORMATION' => array(
        'blocklabel' => 'LBL_ASSET_INFORMATION',
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
        'sequence' => '3',
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
        'sequence' => '4',
        'show_title' => '0',
        'visible' => '0',
        'create_view' => '0',
        'edit_view' => '0',
        'detail_view' => '0',
        'display_status' => '1',
        'iscustom' => '0'
    ),
    'LBL_MANAGEMENT_INFORMATION' => array(
        'blocklabel' => 'LBL_MANAGEMENT_INFORMATION',
        'sequence' => '2',
        'show_title' => '0',
        'visible' => '0',
        'create_view' => '0',
        'edit_view' => '0',
        'detail_view' => '0',
        'display_status' => '1',
        'iscustom' => '1'
    ),
    'LBL_SYSTEM_INFORMATION' => array(
        'blocklabel' => 'LBL_SYSTEM_INFORMATION',
        'sequence' => '5',
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
    'asset_no' => array(
        'columnname' => 'asset_no',
        'tablename' => 'vtiger_assets',
        'generatedtype' => '1',
        'uitype' => '4',
        'fieldname' => 'asset_no',
        'fieldlabel' => 'Asset No',
        'readonly' => '1',
        'presence' => '0',
        'defaultvalue' => '',
        'maximumlength' => '100',
        'sequence' => '1',
        'displaytype' => '1',
        'typeofdata' => 'V~O',
        'quickcreate' => '3',
        'quickcreatesequence' => '0',
        'info_type' => 'BAS',
        'masseditable' => '0',
        'helpinfo' => '
					',
        'summaryfield' => '1',
        'headerfield' => null,
        'isunique' => '0',
        'editview_sequence' => '1',
        'editview_presence' => '0',
        'columntype' => 'varchar(30)',
        'editview_block_name' => 'LBL_ASSET_INFORMATION',
        'detailview_block_name' => 'LBL_ASSET_INFORMATION'
    ),
    'product' => array(
        'columnname' => 'product',
        'tablename' => 'vtiger_assets',
        'generatedtype' => '1',
        'uitype' => '10',
        'fieldname' => 'product',
        'fieldlabel' => 'Product Name',
        'readonly' => '1',
        'presence' => '2',
        'defaultvalue' => '',
        'maximumlength' => '100',
        'sequence' => '3',
        'displaytype' => '1',
        'typeofdata' => 'V~M',
        'quickcreate' => '0',
        'quickcreatesequence' => '3',
        'info_type' => 'BAS',
        'masseditable' => '2',
        'helpinfo' => '
					',
        'summaryfield' => '1',
        'headerfield' => null,
        'isunique' => '0',
        'editview_sequence' => '3',
        'editview_presence' => '2',
        'columntype' => 'int(11)',
        'editview_block_name' => 'LBL_ASSET_INFORMATION',
        'detailview_block_name' => 'LBL_ASSET_INFORMATION'
    ),
    'serialnumber' => array(
        'columnname' => 'serialnumber',
        'tablename' => 'vtiger_assets',
        'generatedtype' => '1',
        'uitype' => '2',
        'fieldname' => 'serialnumber',
        'fieldlabel' => 'Serial Number',
        'readonly' => '1',
        'presence' => '2',
        'defaultvalue' => '',
        'maximumlength' => '100',
        'sequence' => '4',
        'displaytype' => '1',
        'typeofdata' => 'V~M',
        'quickcreate' => '0',
        'quickcreatesequence' => '5',
        'info_type' => 'BAS',
        'masseditable' => '2',
        'helpinfo' => '
					',
        'summaryfield' => '0',
        'headerfield' => null,
        'isunique' => '0',
        'editview_sequence' => '4',
        'editview_presence' => '2',
        'columntype' => 'varchar(200)',
        'editview_block_name' => 'LBL_ASSET_INFORMATION',
        'detailview_block_name' => 'LBL_ASSET_INFORMATION'
    ),
    'datesold' => array(
        'columnname' => 'datesold',
        'tablename' => 'vtiger_assets',
        'generatedtype' => '1',
        'uitype' => '5',
        'fieldname' => 'datesold',
        'fieldlabel' => 'Date Sold',
        'readonly' => '1',
        'presence' => '2',
        'defaultvalue' => '',
        'maximumlength' => '100',
        'sequence' => '5',
        'displaytype' => '1',
        'typeofdata' => 'D~O~OTH~GE~datesold~Date Sold',
        'quickcreate' => '2',
        'quickcreatesequence' => '0',
        'info_type' => 'BAS',
        'masseditable' => '2',
        'helpinfo' => '
					',
        'summaryfield' => '0',
        'headerfield' => null,
        'isunique' => '0',
        'editview_sequence' => '5',
        'editview_presence' => '2',
        'columntype' => 'date',
        'editview_block_name' => 'LBL_ASSET_INFORMATION',
        'detailview_block_name' => 'LBL_ASSET_INFORMATION'
    ),
    'dateinservice' => array(
        'columnname' => 'dateinservice',
        'tablename' => 'vtiger_assets',
        'generatedtype' => '1',
        'uitype' => '5',
        'fieldname' => 'dateinservice',
        'fieldlabel' => 'Date in Service',
        'readonly' => '1',
        'presence' => '2',
        'defaultvalue' => '',
        'maximumlength' => '100',
        'sequence' => '6',
        'displaytype' => '1',
        'typeofdata' => 'D~O~OTH~GE~dateinservice~Date in Service',
        'quickcreate' => '2',
        'quickcreatesequence' => '4',
        'info_type' => 'BAS',
        'masseditable' => '2',
        'helpinfo' => '
					',
        'summaryfield' => '0',
        'headerfield' => null,
        'isunique' => '0',
        'editview_sequence' => '6',
        'editview_presence' => '2',
        'columntype' => 'date',
        'editview_block_name' => 'LBL_ASSET_INFORMATION',
        'detailview_block_name' => 'LBL_ASSET_INFORMATION'
    ),
    'assetstatus' => array(
        'columnname' => 'assetstatus',
        'tablename' => 'vtiger_assets',
        'generatedtype' => '1',
        'uitype' => '15',
        'fieldname' => 'assetstatus',
        'fieldlabel' => 'Status',
        'readonly' => '1',
        'presence' => '2',
        'defaultvalue' => '',
        'maximumlength' => '100',
        'sequence' => '10',
        'displaytype' => '1',
        'typeofdata' => 'V~M',
        'quickcreate' => '0',
        'quickcreatesequence' => '0',
        'info_type' => 'BAS',
        'masseditable' => '2',
        'helpinfo' => '
					',
        'summaryfield' => '0',
        'headerfield' => null,
        'isunique' => '0',
        'editview_sequence' => '10',
        'editview_presence' => '2',
        'columntype' => 'varchar(200)',
        'editview_block_name' => 'LBL_ASSET_INFORMATION',
        'detailview_block_name' => 'LBL_ASSET_INFORMATION'
    ),
    'tagnumber' => array(
        'columnname' => 'tagnumber',
        'tablename' => 'vtiger_assets',
        'generatedtype' => '1',
        'uitype' => '2',
        'fieldname' => 'tagnumber',
        'fieldlabel' => 'Tag Number',
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
        'helpinfo' => '
					',
        'summaryfield' => '0',
        'headerfield' => null,
        'isunique' => '0',
        'editview_sequence' => '12',
        'editview_presence' => '2',
        'columntype' => 'varchar(300)',
        'editview_block_name' => 'LBL_ASSET_INFORMATION',
        'detailview_block_name' => 'LBL_ASSET_INFORMATION'
    ),
    'invoiceid' => array(
        'columnname' => 'invoiceid',
        'tablename' => 'vtiger_assets',
        'generatedtype' => '1',
        'uitype' => '10',
        'fieldname' => 'invoiceid',
        'fieldlabel' => 'Invoice Name',
        'readonly' => '1',
        'presence' => '2',
        'defaultvalue' => '',
        'maximumlength' => '100',
        'sequence' => '9',
        'displaytype' => '1',
        'typeofdata' => 'V~O',
        'quickcreate' => '1',
        'quickcreatesequence' => '0',
        'info_type' => 'BAS',
        'masseditable' => '2',
        'helpinfo' => '
					',
        'summaryfield' => '0',
        'headerfield' => null,
        'isunique' => '0',
        'editview_sequence' => '9',
        'editview_presence' => '2',
        'columntype' => 'int(11)',
        'editview_block_name' => 'LBL_ASSET_INFORMATION',
        'detailview_block_name' => 'LBL_ASSET_INFORMATION'
    ),
    'shippingmethod' => array(
        'columnname' => 'shippingmethod',
        'tablename' => 'vtiger_assets',
        'generatedtype' => '1',
        'uitype' => '2',
        'fieldname' => 'shippingmethod',
        'fieldlabel' => 'Shipping Method',
        'readonly' => '1',
        'presence' => '1',
        'defaultvalue' => '',
        'maximumlength' => '100',
        'sequence' => '10',
        'displaytype' => '1',
        'typeofdata' => 'V~O',
        'quickcreate' => '1',
        'quickcreatesequence' => '0',
        'info_type' => 'BAS',
        'masseditable' => '2',
        'helpinfo' => '
					',
        'summaryfield' => '0',
        'headerfield' => null,
        'isunique' => '0',
        'editview_sequence' => '10',
        'editview_presence' => '1',
        'columntype' => 'varchar(200)',
        'editview_block_name' => 'LBL_ASSET_INFORMATION',
        'detailview_block_name' => 'LBL_ASSET_INFORMATION'
    ),
    'shippingtrackingnumber' => array(
        'columnname' => 'shippingtrackingnumber',
        'tablename' => 'vtiger_assets',
        'generatedtype' => '1',
        'uitype' => '2',
        'fieldname' => 'shippingtrackingnumber',
        'fieldlabel' => 'Shipping Tracking Number',
        'readonly' => '1',
        'presence' => '1',
        'defaultvalue' => '',
        'maximumlength' => '100',
        'sequence' => '11',
        'displaytype' => '1',
        'typeofdata' => 'V~O',
        'quickcreate' => '1',
        'quickcreatesequence' => '0',
        'info_type' => 'BAS',
        'masseditable' => '2',
        'helpinfo' => '
					',
        'summaryfield' => '0',
        'headerfield' => null,
        'isunique' => '0',
        'editview_sequence' => '11',
        'editview_presence' => '1',
        'columntype' => 'varchar(200)',
        'editview_block_name' => 'LBL_ASSET_INFORMATION',
        'detailview_block_name' => 'LBL_ASSET_INFORMATION'
    ),
    'assigned_user_id' => array(
        'columnname' => 'smownerid',
        'tablename' => 'vtiger_crmentity',
        'generatedtype' => '1',
        'uitype' => '53',
        'fieldname' => 'assigned_user_id',
        'fieldlabel' => 'Assigned To',
        'readonly' => '1',
        'presence' => '2',
        'defaultvalue' => '',
        'maximumlength' => '100',
        'sequence' => '1',
        'displaytype' => '1',
        'typeofdata' => 'V~M',
        'quickcreate' => '0',
        'quickcreatesequence' => '2',
        'info_type' => 'BAS',
        'masseditable' => '1',
        'helpinfo' => '
					',
        'summaryfield' => '0',
        'headerfield' => null,
        'isunique' => '0',
        'editview_sequence' => '1',
        'editview_presence' => '2',
        'columntype' => 'int(11)',
        'editview_block_name' => 'LBL_MANAGEMENT_INFORMATION',
        'detailview_block_name' => null
    ),
    'assetname' => array(
        'columnname' => 'assetname',
        'tablename' => 'vtiger_assets',
        'generatedtype' => '1',
        'uitype' => '1',
        'fieldname' => 'assetname',
        'fieldlabel' => 'Asset Name',
        'readonly' => '1',
        'presence' => '0',
        'defaultvalue' => '',
        'maximumlength' => '100',
        'sequence' => '2',
        'displaytype' => '1',
        'typeofdata' => 'V~M',
        'quickcreate' => '0',
        'quickcreatesequence' => '6',
        'info_type' => 'BAS',
        'masseditable' => '2',
        'helpinfo' => '
					',
        'summaryfield' => '1',
        'headerfield' => null,
        'isunique' => '0',
        'editview_sequence' => '2',
        'editview_presence' => '0',
        'columntype' => 'varchar(100)',
        'editview_block_name' => 'LBL_ASSET_INFORMATION',
        'detailview_block_name' => 'LBL_ASSET_INFORMATION'
    ),
    'account' => array(
        'columnname' => 'account',
        'tablename' => 'vtiger_assets',
        'generatedtype' => '1',
        'uitype' => '10',
        'fieldname' => 'account',
        'fieldlabel' => 'Customer Name',
        'readonly' => '1',
        'presence' => '2',
        'defaultvalue' => '',
        'maximumlength' => '100',
        'sequence' => '7',
        'displaytype' => '1',
        'typeofdata' => 'V~M',
        'quickcreate' => '0',
        'quickcreatesequence' => '0',
        'info_type' => 'BAS',
        'masseditable' => '2',
        'helpinfo' => '
					',
        'summaryfield' => '1',
        'headerfield' => null,
        'isunique' => '0',
        'editview_sequence' => '7',
        'editview_presence' => '2',
        'columntype' => 'int(11)',
        'editview_block_name' => 'LBL_ASSET_INFORMATION',
        'detailview_block_name' => 'LBL_ASSET_INFORMATION'
    ),
    'contact' => array(
        'columnname' => 'contact',
        'tablename' => 'vtiger_assets',
        'generatedtype' => '1',
        'uitype' => '10',
        'fieldname' => 'contact',
        'fieldlabel' => 'Contact Name',
        'readonly' => '1',
        'presence' => '2',
        'defaultvalue' => '',
        'maximumlength' => '100',
        'sequence' => '8',
        'displaytype' => '1',
        'typeofdata' => 'V~O',
        'quickcreate' => '0',
        'quickcreatesequence' => '0',
        'info_type' => 'BAS',
        'masseditable' => '2',
        'helpinfo' => '
					',
        'summaryfield' => '0',
        'headerfield' => null,
        'isunique' => '0',
        'editview_sequence' => '8',
        'editview_presence' => '2',
        'columntype' => 'int(11)',
        'editview_block_name' => 'LBL_ASSET_INFORMATION',
        'detailview_block_name' => 'LBL_ASSET_INFORMATION'
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
        'sequence' => '1',
        'displaytype' => '2',
        'typeofdata' => 'DT~O',
        'quickcreate' => '3',
        'quickcreatesequence' => '0',
        'info_type' => 'BAS',
        'masseditable' => '0',
        'helpinfo' => '
					',
        'summaryfield' => '0',
        'headerfield' => null,
        'isunique' => '0',
        'editview_sequence' => '1',
        'editview_presence' => '0',
        'columntype' => 'datetime',
        'editview_block_name' => 'LBL_SYSTEM_INFORMATION',
        'detailview_block_name' => 'LBL_SYSTEM_INFORMATION'
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
        'sequence' => '3',
        'displaytype' => '2',
        'typeofdata' => 'DT~O',
        'quickcreate' => '3',
        'quickcreatesequence' => '0',
        'info_type' => 'BAS',
        'masseditable' => '0',
        'helpinfo' => '
					',
        'summaryfield' => '0',
        'headerfield' => null,
        'isunique' => '0',
        'editview_sequence' => '3',
        'editview_presence' => '0',
        'columntype' => 'datetime',
        'editview_block_name' => 'LBL_SYSTEM_INFORMATION',
        'detailview_block_name' => 'LBL_SYSTEM_INFORMATION'
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
        'sequence' => '16',
        'displaytype' => '2',
        'typeofdata' => 'V~O',
        'quickcreate' => '3',
        'quickcreatesequence' => '0',
        'info_type' => 'BAS',
        'masseditable' => '0',
        'helpinfo' => '
					',
        'summaryfield' => '0',
        'headerfield' => null,
        'isunique' => '0',
        'editview_sequence' => '16',
        'editview_presence' => '0',
        'columntype' => 'int(11)',
        'editview_block_name' => 'LBL_ASSET_INFORMATION',
        'detailview_block_name' => 'LBL_ASSET_INFORMATION'
    ),
    'description' => array(
        'columnname' => 'description',
        'tablename' => 'vtiger_crmentity',
        'generatedtype' => '1',
        'uitype' => '19',
        'fieldname' => 'description',
        'fieldlabel' => 'Notes',
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
        'masseditable' => '2',
        'helpinfo' => '
					',
        'summaryfield' => '0',
        'headerfield' => null,
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
        'sequence' => '4',
        'displaytype' => '2',
        'typeofdata' => 'V~O',
        'quickcreate' => '3',
        'quickcreatesequence' => '7',
        'info_type' => 'BAS',
        'masseditable' => '0',
        'helpinfo' => '',
        'summaryfield' => '0',
        'headerfield' => null,
        'isunique' => '0',
        'editview_sequence' => '4',
        'editview_presence' => '2',
        'columntype' => 'varchar(100)',
        'editview_block_name' => 'LBL_SYSTEM_INFORMATION',
        'detailview_block_name' => 'LBL_SYSTEM_INFORMATION'
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
        'sequence' => '18',
        'displaytype' => '6',
        'typeofdata' => 'C~O',
        'quickcreate' => '3',
        'quickcreatesequence' => '8',
        'info_type' => 'BAS',
        'masseditable' => '0',
        'helpinfo' => '',
        'summaryfield' => '0',
        'headerfield' => null,
        'isunique' => '0',
        'editview_sequence' => '18',
        'editview_presence' => '2',
        'columntype' => 'varchar(100)',
        'editview_block_name' => 'LBL_ASSET_INFORMATION',
        'detailview_block_name' => 'LBL_ASSET_INFORMATION'
    ),
    'tags' => array(
        'columnname' => 'tags',
        'tablename' => 'vtiger_assets',
        'generatedtype' => '1',
        'uitype' => '1',
        'fieldname' => 'tags',
        'fieldlabel' => 'tags',
        'readonly' => '1',
        'presence' => '2',
        'defaultvalue' => '',
        'maximumlength' => '100',
        'sequence' => '19',
        'displaytype' => '6',
        'typeofdata' => 'V~O',
        'quickcreate' => '3',
        'quickcreatesequence' => '9',
        'info_type' => 'BAS',
        'masseditable' => '0',
        'helpinfo' => '',
        'summaryfield' => '0',
        'headerfield' => null,
        'isunique' => '0',
        'editview_sequence' => '19',
        'editview_presence' => '2',
        'columntype' => 'varchar(1)',
        'editview_block_name' => 'LBL_ASSET_INFORMATION',
        'detailview_block_name' => 'LBL_ASSET_INFORMATION'
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
        'editview_presence' => '1',
        'columntype' => 'int(11)',
        'editview_block_name' => 'LBL_SYSTEM_INFORMATION',
        'detailview_block_name' => 'LBL_SYSTEM_INFORMATION'
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
        'editview_block_name' => 'LBL_MANAGEMENT_INFORMATION',
        'detailview_block_name' => 'LBL_MANAGEMENT_INFORMATION'
    ),
    'users_department' => array(
        'columnname' => 'users_department',
        'tablename' => 'vtiger_assets',
        'generatedtype' => '1',
        'uitype' => '16',
        'fieldname' => 'users_department',
        'fieldlabel' => 'LBL_USERS_DEPARTMENT',
        'readonly' => '1',
        'presence' => '1',
        'defaultvalue' => '',
        'maximumlength' => '100',
        'sequence' => '3',
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
        'detailview_block_name' => null
    )
);

