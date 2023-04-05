{strip}
    <link rel="stylesheet"
        href="{vresource_url('libraries/jquery/bootstrapswitch/css/bootstrap3/bootstrap-switch.min.css')}" />
    <script src="{vresource_url('libraries/jquery/bootstrapswitch/js/bootstrap-switch.min.js')}"></script>

    <div id="checkWarranty">
        <h4>{vtranslate('LBL_CHECK_WARRANTY_TITLE', 'Products')}</h4>
    </div>

    {* Tab layout *}
    <div id="tabLayout">
        <div class="contents tabbable">
            <ul class="nav nav-tabs marginBottom10px">
                <li class="tab1 active"><a data-toggle="tab" href="#tab1"><strong>Thông tin bảo hành</strong></a></li>
                <li class="tab2"><a data-toggle="tab" href="#tab2"><strong>Thông tin cá nhân</strong></a></li>
            </ul>
            <div class="tab-content overflowVisible">
                <div class="tab-pane active" id="tab1">

                    <form class="form-horizontal declareProductForm" method="POST">

                        <div id="uiComponent">

                            {* Dropdown *}
                            <div class="form-group" id="dropDown">
                                <label class="control-label fieldLabel">
                                    <select class="referenceModulesList select2" tabindex="-1" style="width: 140px;">
                                        <option value="Accounts">Accounts</option>
                                        <option value="Contacts">Contacts</option>
                                        <option value="Leads">Leads</option>
                                    </select>
                                </label>
                            </div>

                            {* TextField *}
                            <div class="form-group id=" textField">
                                <div class="controls fieldValue ">
                                    <div class="referencefield-wrapper">
                                        <input name="popupReferenceModule" type="hidden" value="Accounts">
                                        <div class="input-group">
                                            <input name="parent_id" type="hidden" value="" class="sourceField"
                                                data-displayvalue="" />
                                            <input id="parent_id_display" name="parent_id_display"
                                                data-fieldname="parent_id" data-fieldtype="reference" type="text"
                                                class="marginLeftZero autoComplete inputElement ui-autocomplete-input"
                                                value="" placeholder="{vtranslate('LBL_TYPE_SEARCH', 'Vtiger')}"
                                                autocomplete="off" />
                                            <a href="#" class="clearReferenceSelection hide">&nbsp;x&nbsp;</a>
                                            <span class="input-group-addon relatedPopup cursorPointer"
                                                title="{vtranslate('LBL_SELECT', 'Vtiger')}"><i id="parent_id_select"
                                                    class="fa fa-search"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        {* Date field *}
                        <div class="form-group id=" dateField">
                                <div class="input-group inputElement" style="margin-bottom: 3px">
                                    <input type="text" name="<Date-Field-Name>" placeholder="{vtranslate('LBL_WARRANTY_DATE', 'Products')}" class="form-control dateField"
                                        data-fieldtype="date" data-date- format="{$USER_MODEL->get('date_format')}"
                                        data-rule-required="true" />
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                </div>
                            </div>

                            {* Time picker *}
                            <div class="form-group id=" timePicker">
                            <div class="input-group inputElement time">
                                <input type="text" name="<Time-Field-Name>" class="timepicker-default form-control"
                                    data-format="12" data-rule- required="true" />
                                <span class="input-group-addon">
                                    <i class="fa fa-clock-o"></i>
                                </span>
                            </div>
                        </div>

                        {* Dropdown *}
                        <div class="form-group id=" dropDown2">
                                <select name="leadsource" class="inputElement select2" data-fieldtype="picklist">
                                    <option value="">Loại bảo hành</option>
                                    <option value="value1">50%</option>
                                    <option value="value2">70%</option>
                                    <option value="value3">100%</option>
                                </select>
                            </div>

                            {* Switch button *}
                            <div class="form-group id=" switchButton">
                            <input type="checkbox" name="enable_notification" class="bootstrap-switch"
                                {if $ENABLED_NOTIFICATION eq '1'}checked{/if}>
                            <span class="rememberWarranty">Ghi nhớ bảo hành *</span>
                        </div>

                        {include file='ModalFooter.tpl'|@vtemplate_path:'Vtiger'}
                    </div>
                </form>
            </div>
            <div class="tab-pane" id="tab2">
                    Tab2 content
                </div>
            </div>
        </div>
    </div>
    </div>
{/strip}