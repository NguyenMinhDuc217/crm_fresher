{*
    Author: Phuc Lu
    Date: 2019.10.31
    Purpose: customize the layout with map at the top like Lead
*}

{strip}
    <div class="col-sm-6 col-lg-6 col-md-6">
        <div class="record-header clearfix">
            <div class="hidden-sm hidden-xs recordImage bgleads app-{$SELECTED_MENU_CATEGORY}">
                {assign var=IMAGE_DETAILS value=$RECORD->getImageDetails()}
                {foreach key=ITER item=IMAGE_INFO from=$IMAGE_DETAILS}
                    {if !empty($IMAGE_INFO.path)}
                        <img src="{$IMAGE_INFO.path}_{$IMAGE_INFO.orgname}" alt="{$IMAGE_INFO.orgname}" title="{$IMAGE_INFO.orgname}" width="100%" height="100px" align="left"><br>
                    {else}
                        <img src="{vimage_path('summary_Leads.png')}" class="summaryImg"/>
                    {/if}
                {/foreach}
                {if empty($IMAGE_DETAILS)}
                    <div class="name"><span><strong>{$MODULE_MODEL->getModuleIcon()}</strong></span></div>
				{/if}
            </div>
            <div class="recordBasicInfo">
                <div class="info-row">
                    <h4>
                        <span class="recordLabel pushDown" title="{$RECORD->getDisplayValue('salutationtype')}&nbsp;{$RECORD->getName()}"> 
                            {if $RECORD->getDisplayValue('salutationtype')}
                                <span class="salutation">  {$RECORD->getDisplayValue('salutationtype')}</span>&nbsp;
                            {/if}
                            {assign var=COUNTER value=0}
                            {foreach item=NAME_FIELD from=$MODULE_MODEL->getNameFields()}
                                {assign var=FIELD_MODEL value=$MODULE_MODEL->getField($NAME_FIELD)}
                                {if $FIELD_MODEL->getPermissions()}
                                    <span class="{$NAME_FIELD}">{trim($RECORD->get($NAME_FIELD))}</span>
                                    {if $COUNTER eq 0 && ($RECORD->get($NAME_FIELD))}&nbsp;{assign var=COUNTER value=$COUNTER+1}{/if}
                                {/if}
                            {/foreach}
                        </span>
                    </h4>
                </div>
                {include file="DetailViewHeaderFieldsView.tpl"|vtemplate_path:$MODULE}
                {*
                <div class="info-row row">
                    {assign var=FIELD_MODEL value=$MODULE_MODEL->getField('email')}
                    <div class="col-lg-7 fieldLabel">
                        <span class="email" title="{vtranslate($FIELD_MODEL->get('label'),$MODULE)} : {$RECORD->get('email')}">
                            {$RECORD->getDisplayValue("email")}
                        </span>
                    </div>
                </div>
                <div class="info-row row">
                    {assign var=FIELD_MODEL value=$MODULE_MODEL->getField('phone')}
                    <div class="col-lg-7 fieldLabel">
                        <span class="phone" title="{vtranslate($FIELD_MODEL->get('label'),$MODULE)} : {$RECORD->get('phone')}">
                            {$RECORD->getDisplayValue("phone")}
                        </span>
                    </div>
                </div>
                *}

                {* Modified by Hieu Nguyen on 2022-09-06 to render button show map using a common template *}
                <div class="info-row">
                    {include file='modules/Vtiger/tpls/ShowMap.tpl'}
                </div>
                {* End Hieu Nguyen *}
            </div>
        </div>
    </div>
{/strip}
