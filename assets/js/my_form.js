"use strict";

// Class Definition
var MY_form = function () {
    var Loading = function (el, message) {
        KTApp.block(el, {
            overlayColor: "#000000",
            type: "v2",
            state: "success",
            message: message || "Please wait..."
        })
        
    }

    var LoadingCompleted = function (el) {
        KTApp.unblock(el)
    }
    var showMsg = function (title, text, type) {
        swal.fire({
            title: title,
            text: text,
            type: type,
            showConfirmButton: type == 'success' ? false : true,
            timer: type == 'success' ? 25e2 : 5e3
        })
    }

    // Private Functions
    var handleSignInFormSubmit = function () {
        $('.my-btn-submit').click(function (e) {
            e.preventDefault();
            
            var form = $(this).closest('form');
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
            Loading(form)


            form.ajaxSubmit({
                url: form.attr('action'),
                type: "POST",
                dataType: 'JSON',
                data: form.serialize(),
                success: function (response, status, xhr, $form) {
                    handleAjaxResponse(response, status, xhr, $form)
                }
            });
        });
    }

    var handleAjaxResponse = function (response, status, xhr, $form) {
        var back_url = $form.attr('back-url') || '';

        if (response.error == 1) {
            showMsg('Error : ', response.msg,'error')

        } else {
            showMsg('Success', response.msg, 'success')

            // setTimeout(function () {
            //     window.location.href = this_controller + back_url;
            // }, 15e2);
        }
        LoadingCompleted($form)
        
    }

    // Public Functions
    return {
        // public functions
        init: function () {
            handleSignInFormSubmit();
        }
    };
}();

// Class Initialization
jQuery(document).ready(function () {
    MY_form.init();
});