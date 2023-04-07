CustomView_BaseController_Js('Products_CheckWarranty2_Js', {}, {
    // registerEvents is fired after the interface loads -> the registerEventFormInit function will be fired
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
                // Show status ajax loading
                app.helper.showProgress();

                var params = {
                    module: 'Products',
                    // Call to ajax handler
                    view: 'CheckWarrantyAjax',
                    serial: serial
                };
                
                // Submit form via ajax
                app.request.post({ data: params })
                    .then(function (error, data) {
                        // Hide status ajax loading
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