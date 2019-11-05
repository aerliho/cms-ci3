"use strict";

// Class Definition
var MY_global = function () {
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

    // Public Functions
    return {
        // public functions
        Loading: function (el, message) {
            Loading(el, message)
        },
        LoadingCompleted: function (el) {
            LoadingCompleted(el)
        },
        showMsg: function (title, text, type) {
            showMsg(title, text, type)
        }
    };
}();

// Class Initialization
jQuery(document).ready(function () {
    
});