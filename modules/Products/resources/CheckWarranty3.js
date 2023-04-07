CustomView_BaseController_Js('Products_CheckWarranty3_Js', {}, {
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
                var now = new Date().toISOString().slice(0,10);
                // Show status ajax loading
                app.helper.showProgress();
                $('#result').hide();

                var params = {
                    module: 'Products',
                    // Call to ajax handler
                    action: 'CheckWarrantyAjax',
                    serial: serial
                };

                // Submit form via ajax
                app.request.post({ data: params })
                    .then(function (error, data) {
                        // Hide status ajax loading
                        app.helper.hideProgress();

                        if (error) {
                            var errorMsg = app.vtranslate('JS_CHECK_WARRANTY_ERROR_MSG', 'Products');
                            // Show notification
                            app.helper.showErrorNotification({ message: errorMsg });
                            return;
                        }
                        
                        if (data.matched_product == null || data.matched_product.productname == '') {
                            var errorMsg = app.vtranslate('JS_CHECK_WARRANTY_NO_PRODUCT_MATCH_ERROR_MSG', 'Products');
                            // Show notification
                            app.helper.showErrorNotification({ message: errorMsg });
                            return;
                        }
                        
                        // Check warranty expires
                        if (data.matched_product['expiry_date'] < now) {
                            var errorMsg = app.vtranslate('JS_WARRANTY_STATUS_ENDED', 'Products');
                            // Show notification
                            app.helper.showErrorNotification({ message: errorMsg });
                        }

                        // Show result
                        var productInfo = data.matched_product;
                        var warrantyStatusClass = (productInfo.warranty_status == 'valid') ? 'label-success' : 'label-danger';
                        $('#productName').text(productInfo.productname);
                        $('#serialNo').text(productInfo.serialno);
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