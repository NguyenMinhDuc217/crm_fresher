{*<!--
/*+***********************************************************************************
* The contents of this file are subject to the vtiger CRM Public License Version 1.1
* ("License"); You may not use this file except in compliance with the License
* The Original Code is: vtiger CRM Open Source
* The Initial Developer of the Original Code is vtiger.
* Portions created by vtiger are Copyright (C) vtiger.
* All Rights Reserved.
************************************************************************************/
-->*}

{strip}
	<div class="col-sm-12 col-xs-12 module-action-bar clearfix coloredBorderTop">
		<div class="module-action-content clearfix">
			<div class="col-lg-7 col-md-7 module-breadcrumb module-breadcrumb-{$smarty.request.view}">
				{assign var=MODULE_MODEL value=Vtiger_Module_Model::getInstance($MODULE)}
				{if $MODULE_MODEL->getDefaultViewName() neq 'List'}
					{assign var=DEFAULT_FILTER_URL value=$MODULE_MODEL->getDefaultUrl()}
				{else}
					{assign var=DEFAULT_FILTER_ID value=$MODULE_MODEL->getDefaultCustomFilter()}
					{if $DEFAULT_FILTER_ID}
						{assign var=CVURL value="&viewname="|cat:$DEFAULT_FILTER_ID}
						{assign var=DEFAULT_FILTER_URL value=$MODULE_MODEL->getListViewUrl()|cat:$CVURL}
					{else}
						{assign var=DEFAULT_FILTER_URL value=$MODULE_MODEL->getListViewUrlWithAllFilter()}
					{/if}
				{/if}
				<a title="{vtranslate($MODULE, $MODULE)}" href='{$DEFAULT_FILTER_URL}&app={$SELECTED_MENU_CATEGORY}'><h4 class="module-title pull-left textOverflowEllipsis text-uppercase">&nbsp;{vtranslate($MODULE, $MODULE)}&nbsp;</h4></a>
				{if $smarty.session.lvs.$MODULE.viewname}
					{assign var=VIEWID value=$smarty.session.lvs.$MODULE.viewname}
				{/if}
				{if $VIEWID}
					{foreach item=FILTER_TYPES from=$CUSTOM_VIEWS}
						{foreach item=FILTERS from=$FILTER_TYPES}
							{if $FILTERS->get('cvid') eq $VIEWID}
								{assign var=CVNAME value=$FILTERS->get('viewname')}
								{if $CVNAME == 'All'}{assign var=CVNAME value=vtranslate('All')}{/if}
								{break}
							{/if}
						{/foreach}
					{/foreach}
					<p  class="current-filter-name filter-name pull-left cursorPointer" title="{$CVNAME}">&nbsp;<span class="far fa-angle-right pull-left" aria-hidden="true"></span><a  href='{$MODULE_MODEL->getListViewUrl()}&viewname={$VIEWID}'>&nbsp;{$CVNAME}&nbsp;</a> </p>
				{/if}
				{assign var=SINGLE_MODULE_NAME value='SINGLE_'|cat:$MODULE}
				{if $RECORD and $smarty.request.view eq 'Edit'}
					<p class="current-filter-name filter-name pull-left "><span class="far fa-angle-right pull-left" aria-hidden="true"></span><a title="{$RECORD->get('label')}">&nbsp;{vtranslate('LBL_EDITING', $MODULE)} : {$RECORD->get('label')}&nbsp;</a></p>
				{else if $smarty.request.view eq 'Edit'}
					<p class="current-filter-name filter-name pull-left "><span class="far fa-angle-right pull-left" aria-hidden="true"></span><a>&nbsp;{vtranslate('LBL_ADDING_NEW', $MODULE)}&nbsp;</a></p>
				{/if}
				{if $smarty.request.view eq 'Detail'}
					<p class="current-filter-name filter-name pull-left"><span class="far fa-angle-right pull-left" aria-hidden="true"></span><a title="{$RECORD->get('label')}">&nbsp;{$RECORD->get('label')}&nbsp;</a></p>
				{/if}
			</div>
			<div class="col-lg-5 col-md-5 pull-right ">
				<div id="appnav" class="navbar-right">
					<ul class="nav navbar-nav">
						{foreach item=BASIC_ACTION from=$MODULE_BASIC_ACTIONS}
							{if $BASIC_ACTION->getLabel() eq 'LBL_ADD_RECORD'}
								<li>
									<div>
										<button type="button" class="btn btn-default module-buttons dropdown-toggle" data-toggle="dropdown">
											<span class="far fa-plus" title="{vtranslate('LBL_NEW_DOCUMENT', $MODULE)}"></span>&nbsp;&nbsp;{vtranslate('LBL_NEW_DOCUMENT', $MODULE)}&nbsp;<i class="far fa-angle-down"></i>
										</button>
										<ul class="dropdown-menu">
											<li class="dropdown-header"><i class="far fa-upload"></i> {vtranslate('LBL_FILE_UPLOAD', $MODULE)}</li>
											<li id="VtigerAction">
												<a href="javascript:Documents_Index_Js.uploadTo('Vtiger')">
													<i class="far fa-cloud-upload"></i> 
													{vtranslate('LBL_TO_SERVICE', $MODULE_NAME, {vtranslate('LBL_VTIGER', $MODULE_NAME)})}
												</a>
											</li>
											<li role="separator" class="divider"></li>
											<li class="dropdown-header"><i class="far fa-link"></i> {vtranslate('LBL_LINK_EXTERNAL_DOCUMENT', $MODULE)}</li>
											<li id="shareDocument"><a href="javascript:Documents_Index_Js.createDocument('E')"><i class="far fa-external-link"></i>&nbsp; {vtranslate('LBL_FROM_SERVICE', $MODULE_NAME, {vtranslate('LBL_FILE_URL', $MODULE_NAME)})}</a></li>
											<li role="separator" class="divider"></li>
											<li id="createDocument"><a href="javascript:Documents_Index_Js.createDocument('W')"><i class="far fa-file-text"></i>{vtranslate('LBL_CREATE_NEW', $MODULE_NAME, {vtranslate('SINGLE_Documents', $MODULE_NAME)})}</a></li>
										</ul>
									</div>
								</li>
							{/if}
						{/foreach}

						{if $MODULE_SETTING_ACTIONS|@count gt 0}
							<li>
								<div class="settingsIcon">
									<button type="button" class="btn btn-default module-buttons dropdown-toggle" data-toggle="dropdown">
										<span class="far fa-wrench" aria-hidden="true" title="{vtranslate('LBL_SETTINGS', $MODULE)}"></span>&nbsp;{vtranslate('LBL_CUSTOMIZE', 'Reports')}&nbsp; <i class="far fa-angle-down"></i>
									</button>
									<ul class="detailViewSetting dropdown-menu">
										{foreach item=SETTING from=$MODULE_SETTING_ACTIONS}
											{* Added by Hieu Nguyen on 2022-05-10 to support access Layout Editor for developer only by config *}
											{assign var='LAYOUT_EDITOR_CONFIG' value=getGlobalVariable('layoutEditorConfig')}

											{if $SETTING->getLabel() == 'LBL_EDIT_FIELDS' && !isDeveloperMode()}
												{if !empty($LAYOUT_EDITOR_CONFIG['modules_allow_developer_only']) && in_array($MODULE_NAME, $LAYOUT_EDITOR_CONFIG['modules_allow_developer_only']) }
													{continue}
												{/if}
											{/if}
											{* End Hieu Nguyen *}
											
											{if {vtranslate($SETTING->getLabel())} eq "%s Numbering"}
												<li id="{$MODULE_NAME}_listview_advancedAction_{$SETTING->getLabel()}"><a href={$SETTING->getUrl()}>{vtranslate($SETTING->getLabel(), $MODULE_NAME ,vtranslate($MODULE_NAME, $MODULE_NAME))}</a></li>
											{else}
												<li id="{$MODULE_NAME}_listview_advancedAction_{$SETTING->getLabel()}"><a href={$SETTING->getUrl()}>{vtranslate($SETTING->getLabel(), $MODULE_NAME, vtranslate("SINGLE_$MODULE_NAME", $MODULE_NAME))}</a></li>
											{/if}
										{/foreach}
									</ul>
								</div>
							</li>
						{/if}
					</ul>
				</div>
			</div>
		</div>
		{if $FIELDS_INFO neq null}
			<script type="text/javascript">
				var uimeta = (function() {
					var fieldInfo  = {$FIELDS_INFO};
					return {
						field: {
							get: function(name, property) {
								if(name && property === undefined) {
									return fieldInfo[name];
								}
								if(name && property) {
									return fieldInfo[name][property]
								}
							},
							isMandatory : function(name){
								if(fieldInfo[name]) {
									return fieldInfo[name].mandatory;
								}
								return false;
							},
							getType : function(name){
								if(fieldInfo[name]) {
									return fieldInfo[name].type
								}
								return false;
							}
						}
					};
				})();
			</script>
		{/if}
	</div>
{/strip}
