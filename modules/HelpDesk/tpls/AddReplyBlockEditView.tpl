{* Added by Tin Bui on 2022.03.16 - Add reply block editview UI *}
{strip}
    <div class="customBlock emailEditorBlock">
        <h4>{vtranslate('LBL_REPLY_TICKET', 'HelpDesk')}</h4>
        <hr>
        <div class="emailContentWrapper">
            <textarea name="emailContent" class="emailContent" id="emailContent"></textarea>
        </div>
        <div class="emailActions">
            <div class="fieldWrapper">
                <div class="fieldTitle">{vtranslate('LBL_ATTACHMENT', 'HelpDesk')}</div>
                <div class="fieldValueWrapper">
                    <div class="fileUploadContainer text-left with-preview">
                        <div class="fileUploadBtn btn btn-primary">
                            <span>
                                <i class="fa fa-laptop"></i>
                                &nbsp;
                                {vtranslate('LBL_UPLOAD', $MODULE)}
                            </span>
                            <input multiple type="file" class="multifileElement inputElement" name="emailAttachments[]"
                                {if !empty($SPECIAL_VALIDATOR)}
                                    data-validator='{Zend_Json::encode($SPECIAL_VALIDATOR)}'
                                {/if}
                                {if !empty($FILE_VALIDATOR_CONFIGS)}
                                    data-filevalidator='{Vtiger_Util_Helper::toSafeHTML(Zend_JSON::encode($FILE_VALIDATOR_CONFIGS))}'
                                {/if}
                            />
                        </div>
                        <div class="uploadedFileDetails {if $IS_EXTERNAL_LOCATION_TYPE}hide{/if}">
                            <div class="uploadedFileSize"></div>
                            <div class="uploadedFileName"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
{/strip}
{* Ended by Tin Bui *}