{* Added by Minh Duc on 2023-04-03 *}

{strip}
    <label>
        <input type="radio" name="accounts_business_type" value="B2B" {if $RECORD && $RECORD->get('accounts_business_type') == "B2B"}checked{/if}>
        &nbsp;
        <span>{vtranslate("LBL_BUSINESS_TYPE_B2B", $MODULE)}</span>
    </label>
    &nbsp;&nbsp;
    <label>
        <input type="radio" name="accounts_business_type" value="B2C" {if $RECORD && $RECORD->get('accounts_business_type') == "B2C"}checked{/if}>
        {* <input type="radio" name="accounts_business_type" value="B2C" {if $RECORD && $RECORD->get('accounts_business_type') == "B2C"}checked{/if} {if $RECORD->get('accounts_business_type') == ''}checked{/if}> *}
            &nbsp;
        <span>{vtranslate("LBL_BUSINESS_TYPE_B2C", $MODULE)}</span>
    </label>
{/strip}

{* End Minh Duc *}