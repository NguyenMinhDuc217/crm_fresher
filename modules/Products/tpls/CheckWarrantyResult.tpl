{strip}
    <table>
        <tr>
            <th>{vtranslate('LBL_WARRANTY_PRODUCT_NAME', 'Products')}</th>
            <td>{$PRODUCT_RECORD->get('productname')}</td>
        </tr>
        <tr>
            <th>{vtranslate('LBL_WARRANTY_SERIAL_NO', 'Products')}</th>
            <td>{$PRODUCT_RECORD->get('serialno')}</td>
        </tr>
        <tr>
            <th>{vtranslate('LBL_WARRANTY_START_DATE', 'Products')}</th>
            <td>{$PRODUCT_RECORD->get('start_date')}</td>
        </tr>
        <tr>
            <th>{vtranslate('LBL_WARRANTY_END_DATE', 'Products')}</th>
            <td>{$PRODUCT_RECORD->get('expiry_date')}</td>
        </tr>
        <tr>
            <th>{vtranslate('LBL_WARRANTY_STATUS', 'Products')}</th>
            <td><span id="label {$STATUS_LABEL}">{$WARRANTY_STATUS}</span></td>
        </tr>
    </table>
{/strip}