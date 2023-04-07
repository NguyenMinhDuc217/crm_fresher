// Added by Minh Duc on 05.04.2023

CustomView_BaseController_Js('Accounts_DynamicTableDemo_Js', {}, {
    registerEvents: function () {
        this._super();
        this.registerEventFormInit();
    },
    registerEventFormInit: function () {
        // Init form    
        jQuery(function ($) {
            $('#tblDemo').dynamicTable({
                delAction: 'hide',

                // Xử lý thêm logic tại thời điểm trước khi dòng mới được thêm
                preAddCallback: function(){
                    if($('#tblDemo').find('tbody').find('tr:visible').length == 10){
                        alert('Max is 10 rows');
                        return false;
                    }
                },

                // Xử lý thêm logic tại thời điểm sau khi dòng mới được thêm (insertedRow: thông tin của dòng mới được thêm)
                postAddCallback: function(insertedRow){
                    console.log("Selected row", insertedRow);
                },

                // Xử lý thêm login tại thời điểm sau khi dòng được chọn bị xoá (selectedRow: thông tin dòng đang được chọn)
                preDelCallback: function(selectedRow){
                    console.log('Selected row: ', selectedRow);

                    if($('#tblDemo').find('tbody').find('tr:visible').length == 5){
                        alert('At least 5 rows are required!');
                        return false;
                    }
                    if($('#tblDemo').find('tbody').find('tr:visible').length == 1){
                        alert('At least 1 rows are required!');
                        return false;
                    }
                },

                // Xử lý thêm logic tại thời điểm sau khi dòng được chọn bị xoá
                postDelCallback: function(){
                    console.log('Row deleted!');
                }
            })
        })
    }
});