/*
    EditView.js
    Author: Hieu Nguyen
    Date: 2018-11-29
    Purpose: to handle logic on the UI
*/

jQuery(function ($) {
    // Added by Minh Duc on 2023-04-03
    // Handle custom logic when the save button is clicked
    $('form#EditView').find('.saveButton').click(function () {
        var accountType = $('select[name="accounttype"]');
        var employees = $('input[name="employees"]');
        var annualRevenue = $('input[name="annual_revenue"]');
        
        // Check employees and annual revenue when account type is a competitor
        if (accountType.val() == 'Competitor') {
            var employeesValue = employees.val().trim();
            var annualRevenueValue = annualRevenue.val().trim();
            // Show confirm message when employees or annual revenue is empty
            if (employeesValue == '' || employeesValue == '0' || annualRevenueValue == '') {
                // If user cancel saving to update the empty fields
                // then we will focus on the empty field and postpone the submit event
                if
                    (!confirm(app.vtranslate('JS_CONFIRM_SAVING_COMPETIOR_WITHOUT_ITS_REQUIRED_FIELDS'))) {
                    if (employeesValue == '' || employeesValue == 0) {
                        employees.focus();
                        return false;

                    }
                    if (annualRevenueValue == '') annualRevenue.focus();
                    return false;
                }
            }
        }
    });
    //End Minh Đức

// Init auto complete address
GoogleMaps.initAutocomplete($(':input[name="bill_street"]'), {
    city: $(':input[name="bill_city"]'),
    state: $(':input[name="bill_state"]'),
    zip: $(':input[name="bill_zip"]'),
    country: $(':input[name="bill_country"]')
});

GoogleMaps.initAutocomplete($(':input[name="ship_street"]'), {
    city: $(':input[name="ship_city"]'),
    state: $(':input[name="ship_state"]'),
    zip: $(':input[name="ship_zip"]'),
    country: $(':input[name="ship_country"]')
});

jQuery('form[name="edit"] input[name="accountname"').attr('data-rule-maxlength', 150);  // Added by Vu Mai on 2022-10-21 to hack core add maxlength for accountname input
});