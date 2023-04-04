{*
    PredictionSalesReportFilter.tpl
    Author: Phu Vo
    Date: 2020.08.19
*}

{* Moved Report Filter into seperated template file by Phu Vo on 2020-09-18 so that it can be loaded from Embedded Report Chart *}

{strip}
    {assign var="QUARTER" value=[1 => 'I', 2 => 'II', 3 => 'III', 4 => 'IV']}
    {assign var="CURRENT_YEAR" value='Y'|date}
    {assign var="TO_YEAR" value=$CURRENT_YEAR + 5}
    
    {if isset($PARAMS['year']) && !empty($PARAMS['year'])}
        {assign var="CURRENT_SELECTED_YEAR" value=$PARAMS['year']}
    {else}
        {assign var="CURRENT_SELECTED_YEAR" value='Y'|date}
    {/if}

    {if isset($PARAMS['quarter']) && !empty($PARAMS['quarter'])}
        {assign var="CURRENT_SELECTED_QUARTER" value=$PARAMS['quarter']}
    {else}
        {assign var="CURRENT_SELECTED_QUARTER" value=('m'|date)/4+1}
    {/if}

    {if isset($PARAMS['month']) && !empty($PARAMS['month'])}
        {assign var="CURRENT_SELECTED_MONTH" value=$PARAMS['month']}
    {else}
        {assign var="CURRENT_SELECTED_MONTH" value='m'|date}
    {/if}

    <form id="form-filter" name="filter" action="" method="GET" class="filter-container recordEditView">
        <input type="hidden" name="module" value="Reports"/>
        <input type="hidden" name="view" value="Detail"/>
        <input type="hidden" name="record" value="{$smarty.get.record}" />
        <div class="filter-group">
            <div class="control-label fieldLabel col-sm-4">
                {vtranslate('LBL_REPORT_DISPLAYED_BY', 'Reports')}:
            </div>
            <input type="hidden" name="report_detail" value="1"/>
            <div class="control-label col-sm-8">
                <select name="displayed_by" id="displayed_by" class="filter dislayed-filter width-340">
                    <option value="month" {if isset($PARAMS['displayed_by']) && $PARAMS['displayed_by'] == 'month'}selected{/if}>{vtranslate('LBL_REPORT_MONTH', 'Reports')}</option>
                    <option value="quarter" {if isset($PARAMS['displayed_by']) && $PARAMS['displayed_by'] == 'quarter'}selected{/if}>{vtranslate('LBL_REPORT_QUARTER', 'Reports')}</option>
                </select>
            </div>
        </div>

        <div class="filter-group">
            <div class="control-label fieldLabel col-sm-4">
                {vtranslate('LBL_REPORT_CHOOSE_TIME', 'Reports')}:
            </div>
            <div class="control-label col-sm-8">
                <select name="year" id="year" class="filter dislayed-filter width-340">
                    {for $INDEX=$CURRENT_YEAR to $TO_YEAR}
                        <option value="{$INDEX}" {if $INDEX == $CURRENT_SELECTED_YEAR}selected{/if}>{$INDEX}</option>
                    {/for}
                </select>
            </div>
        </div>

        <div class="filter-group">
            <div class="control-button">
                <button type="submit" class="btn btn-success saveButton">{vtranslate('LBL_REPORT_VIEW_REPORT', 'Reports')}</button>
            </div>
        </div>             
    </form>
{/strip}