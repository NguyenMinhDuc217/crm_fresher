{*+**********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.1
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is: vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 ************************************************************************************}
{* modules/Vtiger/views/Detail.php *}

{* -- Modified by Kelvin Thang on 2020-06-19 -- Fixed wrong path summary content-- *}
{strip}
    <form id="detailView" method="POST">
        {include file='SummaryViewWidgets.tpl'|vtemplate_path:$MODULE_NAME}
    </form>
{/strip}