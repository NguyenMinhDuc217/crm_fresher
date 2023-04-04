CustomView_BaseController_Js('Products_CheckWarranty2_Js', {}, {
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
                app.helper.showProgress();
                var params = {
                    module: 'Products',
                    view: 'CheckWarrantyAjax',
                    serial: serial
                };
                console.log(error, params);
                // Submit form via ajax
                app.request.post({ data: params })
                    .then(function (error, data) {
                        app.helper.hideProgress();
                        if (error) {
                            var errorMsg = app.vtranslate('JS_CHECK_WARRANTY_ERROR_MSG');
                            app.helper.showErrorNotification({ message: errorMsg });
                            return;
                        }
                        // Show result
                        $('#result').html(data);
                    });
                return false; // Prevent submit button to reload the p