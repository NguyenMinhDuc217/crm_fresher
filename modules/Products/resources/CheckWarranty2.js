CustomView_BaseController_Js('Products_CheckWarranty2_Js', {}, {
    // registerEvents được kích hoạt sau khi load giao diện -> hàm registerEventFormInit sẽ được kích hoạt
    registerEvents: function () {
        this._super();
        this.registerEventFormInit();
    },
    registerEventFormInit: function () {
        // Init form
        jQuery(function ($) {
            // Handle click event for button check
            $('#btnCheck').click(function () {
                var serial = $('input[name="serial"]').val();
                // Hiển thị trạng thái ajax loading
                app.helper.showProgress();
                var params = {
                    module: 'Products',
                    //gọi tới nơi xử lý ajax
                    view: 'CheckWarrantyAjax',
                    serial: serial
                };
                // Submit form via ajax
                app.request.post({ data: params })
                    .then(function (error, data) {
                        // Ẩn trạng thái ajax loading
                        app.helper.hideProgress();
                        if (error) {
                            var errorMsg = app.vtranslate('JS_CHECK_WARRANTY_ERROR_MSG', 'Products');
                            app.helper.showErrorNotification({ message: errorMsg });
                            return;
                        }
                        // Show result
                        $('#result').html(data);
                    });
                return false; // Prevent submit button to reload the page
            });
        });
    }
});