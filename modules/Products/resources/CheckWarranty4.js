CustomView_BaseController_Js('Products_CheckWarranty4_Js', {}, {
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
                $('#result').hide();

                var params = {
                    module: 'Products',
                    //gọi tới nơi xử lý ajax
                    action: 'CheckWarrantyAjax',
                    serial: serial
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
                        $('#serialNo').text(productInfo.serialno);
                        $('#warrantyStartDate').text(productInfo.start_date);
                        $('#warrantyEndDate').text(productInfo.expiry_date);
                        $('#warrantyStatus').text(productInfo.warranty_status_label);
                        $('#warrantyStatus').removeClass('label-success label-danger').addClass(warrantyStatusClass);
                        $('#result').show();
                    });
                return false; // Prevent submit button to reload the page
            });

            // Random serial
            $('#serial_no').val((Math.random() + 1).toString(36).substring(7));
            
            // Handle click event for button declare product
            $('#btnDeclare').click(function () {
                var declareProductModal = $('#declareProductModal').clone(true, true);

                // Handle even when show modal,
                var callBackFunction = function (data) {
                    data.find('#declareProductModal').removeClass('hide');
                    var form = data.find('.declareProductForm');

                    //Start the relate field
                    var controller = Vtiger_Edit_Js.getInstance();
                    controller.registerBasicEvents(form);
                    vtUtils.applyFieldElementsView(form);
                    //Start the date field
                    vtUtils.initDatePickerFields(form);

                    // Form validation
                    var params = {
                        submitHandler: function (form) {
                            var form = $(form);
                            // serializeFormData tự động lấy những input k bị disable gắn vào.
                            var params = form.serializeFormData();
                            params['module'] = 'Products';
                            params['action'] = 'DeclareAjax';

                            // Submit form
                            app.request.post({ data: params })
                                .then(function (error, data) {
                                    app.helper.hideProgress();

                                    if (error) {
                                        var errorMsg = app.vtranslate('JS_DECLARE_PRODUCT_ERROR_MSG');
                                        app.helper.showErrorNotification({ 'message': errorMsg });
                                        return;
                                    }

                                    if (error == null && data.success != '1') {
                                        var errorMsg = app.vtranslate('JS_DECLARE_PRODUCT_ERROR_ADREALY');
                                        app.helper.showErrorNotification({ 'message': errorMsg });
                                        return;
                                    }

                                    app.helper.hideModal();

                                    var message = app.vtranslate('JS_DECLARE_PRODUCT_SUCCESS_ERROR_MSG');
                                    app.helper.showSuccessNotification({ 'message': message });
                                });
                        }
                    };

                    form.vtValidate(params);
                };

                var modalParams = {
                    cb: callBackFunction
                };

                app.helper.showModal(declareProductModal, modalParams);

                return false;
            });
        });
    }
});