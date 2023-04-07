{strip}
    {* Added by Minh Duc on 06.04.2023 *}
    
    <div id="AccountListByType">
        <h4>Danh sách tài khoản dạng Competior</h4>

        <table>
            <tr>
                <th>Tên tài khoản</th>
                <th>Số điện thoại</th>
                <th>Loại tài khoản</th>
            </tr>
            {foreach $RESULT as $account}
                <tr>
                    <td>{$account['accountname']}</td>
                    <td>{$account['phone']}</td>
                    <td>{$account['accounts_business_type']}</td>
                </tr>
            {/foreach}
        </table>
    </div>
{/strip}