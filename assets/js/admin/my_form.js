"use strict";

// Class Definition
const editors = {}; // You can also use new Map() if you use ES6.
let MY_form = function () {
    function createEditor($selector) {
        $('.my_ckeditor').each(function () {
            let textarea = $(this)
            let textarea_id = $(this).attr('id')
            ClassicEditor
                .create(document.querySelector('#'+textarea_id) , {
                    ckfinder: {
                        uploadUrl: base_url + 'assets/vendors/custom/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json',
                    },
                    toolbar: {
                        items: [
                            "ckfinder", "|",
                            "heading", "|",
                            "bold",
                            "italic",
                            "link",
                            "bulletedList",
                            "numberedList", "|",
                            "indent",
                            "outdent", "|",
                            "imageUpload",
                            "blockQuote",
                            "insertTable",
                            "mediaEmbed",
                            "undo",
                            "redo"
                        ]
                    },
                })
                .then(editor => {
                    editor.ui.focusTracker.on('change:isFocused', (evt, name, isFocused) => {
                        if (!isFocused) {
                            textarea.val(editor.getData());
                        }
                    });

                    editors[textarea_id] = editor;
                })
                .catch(err => console.log(err.stack));
        })
    }
    function obj_ckeditor() {
        return editors;
    }
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
        },
        select2: function ($selector) {
            $($selector).select2();
        },
        ckeditor: function ($selector) {
            createEditor($selector)
        },
        obj_ckeditor: function () {
            obj_ckeditor()
        },
        datetime: function ($selector) {
            $($selector).datetimepicker({
                format: "yyyy-mm-dd hh:ii",
                showMeridian: !0,
                todayHighlight: !0,
                autoclose: !0,
                pickerPosition: "top-right"
            })
        },
        date: function ($selector) {
            $($selector).datetimepicker({
                format: "yyyy-mm-dd",
                todayHighlight: !0,
                autoclose: !0,
                startView: 2,
                minView: 2,
                forceParse: 0,
                pickerPosition: "top-right"
            })
        },
        time: function ($selector) {
            var $hour_from = $($selector);
            $($selector).datetimepicker({
                format: "hh:ii",
                timeFormat: 'hh:mm',
                showMeridian: !0,
                todayHighlight: !0,
                autoclose: !0,
                startView: 1,
                minView: 0,
                maxView: 1,
                forceParse: 0,
                pickerPosition: "top-right"
            })
            $hour_from.val($hour_from.val().split(' ')[1])
            $hour_from.show();
        }
    };
}();

// Class Initialization
jQuery(document).ready(function () {
    MY_form.init();
});