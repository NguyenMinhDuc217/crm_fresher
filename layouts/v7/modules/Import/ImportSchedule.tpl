{*+**********************************************************************************
* The contents of this file are subject to the vtiger CRM Public License Version 1.1
* ("License"); You may not use this file except in compliance with the License
* The Original Code is: vtiger CRM Open Source
* The Initial Developer of the Original Code is vtiger.
* Portions created by vtiger are Copyright (C) vtiger.
* All Rights Reserved.
************************************************************************************}
{* modules/Import/views/Main.php *}

{* START YOUR IMPLEMENTATION FROM BELOW. Use {debug} for information *}
<div id="scheduleImportMsg" class='fc-overlay-modal modal-content'>    {* Added id attribute by Hieu Nguyen on 2020-09-10 so that it can be recognized by JS *}
    <div class="overlayHeader">
        {assign var=HEADER_TITLE value={'LBL_IMPORT_SCHEDULED'|@vtranslate:$MODULE}}
        {include file="ModalHeader.tpl"|vtemplate_path:$MODULE TITLE=$HEADER_TITLE}
    </div>
    <div class='modal-body' style="margin-bottom:250px">
        <div>
            <table class="table table-borderless">
                {if $ERROR_MESSAGE neq ''}
                    <tr>
                        <td>
                            {$ERROR_MESSAGE}
                        </td>
                    </tr>
                {/if}
                <tr>
                    <td>
                        <table cellpadding="10" cellspacing="0" align="center" class="table table-borderless">
                            <tr>
                                <td>{'LBL_SCHEDULED_IMPORT_DETAILS'|@vtranslate:$MODULE}</td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </div>
    </div>   
    <div class='modal-overlay-footer border1px clearfix'>
        <div class="row clearfix">
            {* Modified by Hieu Nguyen on 2020-09-10 *}
            <div class='textAlignCenter col-lg-12 col-md-12 col-sm-12 '>
                <button  name="cancel" value="{'LBL_CANCEL_IMPORT'|@vtranslate:$MODULE}" class="btn btn-lg btn-danger"
                    onclick="Vtiger_Import_Js.cancelImport('index.php?module={$FOR_MODULE}&view=Import&mode=cancelImport&import_id={$IMPORT_ID}')"
                >
                    {'LBL_CANCEL_IMPORT'|@vtranslate:$MODULE}
                </button>
                
                <button type="button" name="ok" class="btn btn-success btn-lg" data-dismiss="modal">
                    {'LBL_OK_BUTTON_LABEL'|@vtranslate:$MODULE}
                </button> 
            </div>
            {* End Hieu Nguyen *}
        </div>
    </div>
</div>
