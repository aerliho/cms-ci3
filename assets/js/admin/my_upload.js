"use strict";
let KTUppy = function () {
    return {
        init: function () {
            var uppy = Uppy.Core()
            uppy.use(Uppy.DragDrop, {
                target: '#my_upload',
                autoProceed: false

            })
            uppy.use(Uppy.Tus, {
                endpoint: 'https://master.tus.io/files/'
            })
            // uppy.use(Uppy.XHRUpload, {
            //     endpoint: 'http://localhost/cms3/admin/test/upload'
            // })
            // endpoint: 'https://localhost/receive-file.php'
                // var uppy = Uppy.Core()
                // uppy.use(Uppy.DragDrop, {
                //     target: '#my_upload'
                // })
                // uppy.use(Uppy.Tus, {
                // })
        }
    }
}();
jQuery(document).ready(function () {
    KTUppy.init()
});