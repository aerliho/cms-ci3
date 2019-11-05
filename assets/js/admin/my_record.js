"use strict";

// Class Definition
var MY_record = function () {
    var handleButtonDelete = function () {
        
        $(document).on('click','.my-records-btn-delete', function (e) {
            e.preventDefault();
            MY_global.Loading($('#kt_table_1_wrapper'))
            
            $.ajax({
                url: $(this).attr('href'),
                type: "GET",
                dataType: 'JSON',
                success: function (response, status, xhr, $form) {
                    handleAjaxResponse(response, status, xhr, $('#kt_table_1_wrapper'))
                }

            });

        })
    }
    // Private Functions
    
    var handleAjaxResponse = function (response, status, xhr, $form) {
        if (response.error == 1) {
            MY_global.showMsg('Error : ', response.msg, 'error')
            
        } else {
            MY_global.showMsg('Success:  ', response.msg, 'success')            
        }
        MY_global.LoadingCompleted($form)
    }

    // Public Functions
    return {
        // public functions
        init: function () {
            handleButtonDelete();
        }
    };
}();

// Class Initialization
jQuery(document).ready(function () {
    MY_record.init();
});