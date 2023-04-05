CustomView_BaseController_Js('Products_CheckWarranty4_Js', {}, {
    // registerEvents được kích hoạt sau khi load giao diện -> hàm registerEventFormInit sẽ được kích hoạt
    registerEvents: function () {
        this._super();
        this.registerEventFormInit();
    },
    registerEventFormInit: function () {
        // Init form
        jQuery(function ($) {
            form.find('.select2').select2(); // Bind all drodowns
            form.find('[name="leadsource"]').select2(); // Bind a specific dropdown
            
            $('.bootstrap-switch').bootstrapSwitch();
            $('.bootstrap-switch').find('[name="enable_notification"]').bootstrapSwitch();
            // form.find('.bootstrap-switch').bootstrapSwitch(); // Bind all buttons
            // $('.bootstrap-switch').find('enable_notification"]').bootstrapSwitch();
        });
    }
});