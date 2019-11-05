"use strict";

// Class Definition
let MY_form = function () {
    let handleFormSubmit = function () {
        $('.my-btn-submit').click(function (e) {
            e.preventDefault();
            
            let form = $(this).closest('form');
            form.parsley({
                trigger: false,
                errorClass: 'is-invalid',
                successClass: 'is-valid',
                errorsWrapper: '<div class="invalid-feedback"></div>',
                errorTemplate: '<span></span>'
            });

            if (form.parsley().validate() == false) {
                return;
            }
            MY_global.Loading(form)


            form.ajaxSubmit({
                url: form.attr('action'),
                type: "POST",
                dataType: 'JSON',
                data: form.serializeArray(),
                success: function (response, status, xhr, $form) {
                    handleAjaxResponse(response, status, xhr, $form)
                }
            });
        });
    }
    let handleButtonCancel = function () {
        $('.my-btn-cancel').click(function (e) {
            e.preventDefault();

            let form = $(this).closest('form');
            let back_url = form.attr('back-url') || '';
            
            window.location.href = this_controller + back_url;            
        })
    }
    // Private Functions

    let handleAjaxResponse = function (response, status, xhr, $form) {
        if (response.error == 1) {
            MY_global.showMsg('Error : ', response.msg, 'error')
            
        } else {
            MY_global.showMsg('Success', response.msg, 'success')
            
            let back_url = $form.attr('back-url') || '';
            setTimeout(function () {
                window.location.href = this_controller + back_url;
            }, 15e2);
        }
        MY_global.LoadingCompleted($form)
        
    }

    // Public Functions
    return {
        // public functions
        init: function () {
            handleFormSubmit();
            handleButtonCancel();
        }
    };
}();

// Class Initialization
jQuery(document).ready(function () {
    MY_form.init();
});