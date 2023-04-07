CustomView_BaseController_Js('Accounts_TestRecord_Js', {}, {
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
                var productName = $('input[name="productName"]').val();
                // Hiển thị trạng thái ajax loading
                app.helper.showProgress();
                $('#result').hide();

                var params = {
                    module: 'Accounts',
                    //gọi tới nơi xử lý ajax
                    action: 'TestRecord',
                    serial: serial,
                    productName: productName,
                };
                // Submit form via ajax
                app.request.post({ data: params })
                    .then(function (error, data) {
                        // Ẩn trạng thái ajax loading
                        app.helper.hideProgress();

                        if (error) {
                            var errorMsg = app.vtranslate('JS_CHECK_WARRANTY_ERROR_MSG', 'Products');
                            // để hiển thị notification thông báo
                            app.helper.showErrorNotification({ message: errorMsg });
                            return;
                        }

                        if (data.matched_product == null) {
                            var errorMsg = app.vtranslate('JS_CHECK_WARRANTY_NO_PRODUCT_MATCH_ERROR_MSG');
                            // để hiển thị notification thông báo
                            app.helper.showErrorNotification({ message: errorMsg });
                            return;
                        }

                        // Show result
                        var productInfo = data.matched_product;
                        var warrantyStatusClass = (productInfo.warranty_status == 'valid') ? 'label-success' : 'label-danger';
                        $('#productName').text(productInfo.productname);
                        $('#serialNo').text(productInfo.serial_no);
                        $('#warrantyStartDate').text(productInfo.start_date);
                        $('#warrantyEndDate').text(productInfo.expiry_date);
                        $('#warrantyStatus').text(productInfo.warranty_status_label);
                        $('#warrantyStatus').removeClass('label-success label-danger').addClass(warrantyStatusClass);
                        $('#result').show();
                    });
                return false; // Prevent submit button to reload the page
            });
        });
    }
});