{strip} 
    {* Added by Minh Duc : 05.04.2023 *}

    <script src="{vresource_url('modules/Accounts/resources/DynamicTableDemo.js')}"></script>
    <script src="{vresource_url('resources/libraries/DynamicTable/DynamicTable.js')}"></script>
    <link type="text/css" rel="stylesheet" href="{vresource_url('resources/libraries/DynamicTable/DynamicTable.css')}"/>
    <table id="tblDemo" class="dynamicTable" width="60%">
        <thead>
            <tr>
                <th>Họ tên</th>
                <th>Số điện thoại</th>
                <th>Email</th>
                <th>Giá trị</th>
                <th>Tình trạng</th>
                <th><button type="button" class="btnAddRow btn-primary"><i class="fa fa-plus"></i></button></th>
            </tr>
        </thead>
        <tbody></tbody>
        <tfoot class="template" style="display: none"">
            <tr>
            {* deleted[] to determine if the row has been deleted *}
                <td><input type="text" name="feild1" value="" id="feild" class="form-control"/><input type="hidden" id="lastRow" name="deleted[]"/></td>
                <td><input type="text" name="feild2" id="feild" class="form-control"/></td>
                <td><input type="text" name="feild3" id="feild" class="form-control"/></td>
                <td><input type="text" name="feild4" id="feild" class="form-control"/></td>
                <td><input type="text" name="feild5" id="feild" class="form-control"/></td>
                <td><button type="button" class="btnDelRow btn-danger" value="clear" onclick="clearInput()"><i class="fa fa-minus"></i></button></td>
            </tr>
        </tfoot>
    </table>
    
{/strip}