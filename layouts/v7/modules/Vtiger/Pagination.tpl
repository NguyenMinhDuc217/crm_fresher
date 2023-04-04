{*<!--
/*********************************************************************************
** The contents of this file are subject to the vtiger CRM Public License Version 1.0
* ("License"); You may not use this file except in compliance with the License
* The Original Code is: vtiger CRM Open Source
* The Initial Developer of the Original Code is vtiger.
* Portions created by vtiger are Copyright (C) vtiger.
* All Rights Reserved.
*
********************************************************************************/
-->*}
{if !$CLASS_VIEW_ACTION}
    {assign var=CLASS_VIEW_ACTION value='listViewActions'}
    {assign var=CLASS_VIEW_PAGING_INPUT value='listViewPagingInput'}
    {assign var=CLASS_VIEW_PAGING_INPUT_SUBMIT value='listViewPagingInputSubmit'}
    {assign var=CLASS_VIEW_BASIC_ACTION value='listViewBasicAction'}
{/if}
<div class = "{$CLASS_VIEW_ACTION}">
    <div class="btn-group pull-right">
        <button type="button" id="PreviousPageButton" class="btn btn-default" {if !$PAGING_MODEL->isPrevPageExists()} disabled {/if}><i class="far fa-chevron-left"></i></button>
        {if $SHOWPAGEJUMP}
            <button type="button" id="PageJump" data-toggle="dropdown" class="btn btn-default">
                <i class="far fa-ellipsis-h icon" title="{vtranslate('LBL_LISTVIEW_PAGE_JUMP',$moduleName)}"></i>
            </button>
            <ul class="{$CLASS_VIEW_BASIC_ACTION} dropdown-menu" id="PageJumpDropDown">
                <li>
                    <div class="listview-pagenum">
                        <span >{vtranslate('LBL_PAGE',$moduleName)}</span>&nbsp;
                        <strong><span>{$PAGE_NUMBER}</span></strong>&nbsp;
                        <span >{vtranslate('LBL_OF',$moduleName)}</span>&nbsp;
                        <strong><span id="totalPageCount"></span></strong>
                    </div>
                    <div class="listview-pagejump">
                        <input type="text" id="pageToJump" class="{$CLASS_VIEW_PAGING_INPUT} text-center"/>&nbsp;
                        <button type="button" id="pageToJumpSubmit" class="btn btn-success {$CLASS_VIEW_PAGING_INPUT_SUBMIT} text-center">{vtranslate('LBL_PAGINATION_SUBMIT')}</button>
                    </div>    
                </li>
            </ul>
        {/if}
        <button type="button" id="NextPageButton" class="btn btn-default" {if !$PAGING_MODEL->isNextPageExists()}disabled{/if}><i class="far fa-chevron-right"></i></button>
    </div>

    {* Refactored by Hieu Nguyen on 2021-08-13 to display clear paging info *}
    {if $RECORD_COUNT > 0}
        <span class="pagingInfo pull-right">
            <span>{vtranslate('LBL_PAGING_INFO_TEXT', 'Vtiger', ['%start_row' => $PAGING_MODEL->getRecordStartRange(), '%end_row' => $PAGING_MODEL->getRecordEndRange()])}</span>&nbsp;
            <span class="totalRecords cursorPointer"><i class="far fa-question showTotalRecords" title="{vtranslate('LBL_SHOW_TOTAL_NUMBER_OF_RECORDS', $MODULE)}"></i></span>&nbsp;&nbsp;
        </span>
    {/if}
    {* End Hieu Nguyen *}
</div>