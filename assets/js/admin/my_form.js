"use strict";

// Class Definition

let MY_form = function () {
    // ckeditor
    function createEditor() {
        $('.my_ckeditor').each(function () {
            let textarea = $(this)
            let textarea_id = $(this).attr('id')
            ClassicEditor
                .create(document.querySelector('#' + textarea_id), {
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
                })
                .catch(err => console.log(err.stack));
        })
    }

    function createFileUpload() {
        $('.my_fileUpload').each(function () {
            let $id_element = $(this).attr('id');
            //  ckfinder integrate
            $('#btn_' + $id_element).on('click', function () {
                CKFinder.popup({
                    chooseFiles: true,
                    selectMultiple: true,
                    debug: true,
                    width: 800,
                    height: 600,
                    onInit: function (finder) {
                        finder.on('files:choose', function (evt) {
                            var form_input = $('#' + $id_element);
                            var file_input = evt.data.files;
                            var file_upload = form_input.val() != '' ? JSON.parse(form_input.val()) : [];
                            var diff_file = [];

                            for (var index_input = 0; index_input < file_input.length; index_input++) {
                                // Check jika file tidak ada maka akan di push ke file_upload
                                var test = true;
                                if (file_upload.length != 0) {
                                    var file_input_name = file_input.models[index_input].get('name');
                                    var test_array = Array.from(file_upload)

                                    var filtered = test_array.filter(function (el) {
                                        return el.name == this;
                                    }, file_input_name);
                                    test = filtered.length == 0
                                }
                                if (test == true) {
                                    let $new_file = {
                                        url: file_input.models[index_input].getUrl(),
                                        name: file_input.models[index_input].get('name'),
                                        extension: file_input.models[index_input].getExtension()
                                    };
                                    file_upload.push($new_file)
                                    diff_file.push($new_file)
                                }
                            }
                            form_input.val(JSON.stringify(file_upload))
                            $('#diff_' + $id_element).val(JSON.stringify(diff_file))
                            generate_file($id_element)


                        });
                        finder.on('file:choose:resizedImage', function (evt) {
                            var output = $('#' + $input);
                            output.val = evt.data.resizedUrl;
                        });
                    }
                });


            });
            // 
            console.log($(this).val());
            let $_file = ($(this).val() ) ? $(this).val() : '';
            if ($_file.length > 0) {
                $('#diff_' + $id_element).val($_file)
                generate_file($id_element)
            }

        })
    }

    // file_upload
    let generate_file = function ($fileUpload) {
        var $diff = $('#diff_' + $fileUpload).val();
        var $data_file = ($diff != '' && $diff != '[]') ? JSON.parse($diff) : '';

        let $html = $('#template_fileUpload').html();
        let $res = '';
        if ($data_file.length > 0) {
            $data_file.forEach((file) => {
                let $_res = $html;
                $_res = $_res.replace('__link__', file.url)
                $_res = $_res.replace('__fileName__', file.name)
                $_res = $_res.replace('__idFileUpload__', $fileUpload)
                $res += $_res;
            })
            $('#' + $fileUpload).parent().next().append($res)
        }
    }

    let HandlebtnfileUploadDelete = function () {
        $(document).on('click','.btnfileUploadDelete', function () {

            let file_delete = $(this).parents('.kt-widget4__item').find('.kt-widget4__title').text().trim()
            let file_id = $(this).attr('fileuploadid')
            $(this).parents('.kt-widget4__item').remove()
            let file = JSON.parse($('#' + file_id).val())
                .filter((file) => {
                    return file.name != file_delete
                })

            $('#' + file_id).val(
                JSON.stringify(file)
            )
        })

    }
    // form submit
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
            HandlebtnfileUploadDelete();
        },
        select2: function ($selector) {
            $($selector).select2();
        },
        ckeditor: function ($selector) {
            createEditor($selector)
        },
        fileupload: function ($id_element) {
            createFileUpload($id_element)
            generate_file($id_element)

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