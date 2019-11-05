"use strict";
var KTDatatablesDataSourceAjaxServer = function () {

    var initTable1 = function () {
        var table = $('#kt_table_1');
        var edit_url = this_controller+'add/';
        var delete_url = this_controller+'delete/';
        // begin first table
        table.DataTable({
            responsive: true,
            searchDelay: 500,
            processing: true,
            serverSide: true,
            ajax: this_controller+'records',
            columns: [{
                    data: 'nama'
                },
                {
                    data: 'detail'
                },
                {
                    data: 'Actions',
                    
                    responsivePriority: -1
                },
            ],
            columnDefs: [{
                    targets: -1,
                    title: 'Actions',
                    orderable: false,
                    render: function (data, type, full, meta) {

                        return `
                        <a href="`+edit_url+full['id']+`" class="btn btn-sm btn-clean " title="Edit">
                            <i class="la la-edit"></i> Edit
                        </a>
                        <a href = "`+delete_url+full['id']+`"class="btn btn-sm btn-clean my-records-btn-delete" title="Delete" >
                            <i class="la la-remove"></i> Remove
                        </a>
                        `;
                    },
                },

                // {
                //     targets: -3,
                //     render: function (data, type, full, meta) {
                //         var status = {
                //             1: {
                //                 'title': 'Pending',
                //                 'class': 'kt-badge--brand'
                //             },
                //             2: {
                //                 'title': 'Delivered',
                //                 'class': ' kt-badge--danger'
                //             },
                //             3: {
                //                 'title': 'Canceled',
                //                 'class': ' kt-badge--primary'
                //             },
                //             4: {
                //                 'title': 'Success',
                //                 'class': ' kt-badge--success'
                //             },
                //             5: {
                //                 'title': 'Info',
                //                 'class': ' kt-badge--info'
                //             },
                //             6: {
                //                 'title': 'Danger',
                //                 'class': ' kt-badge--danger'
                //             },
                //             7: {
                //                 'title': 'Warning',
                //                 'class': ' kt-badge--warning'
                //             },
                //         };
                //         if (typeof status[data] === 'undefined') {
                //             return data;
                //         }
                //         return '<span class="kt-badge ' + status[data].class + ' kt-badge--inline kt-badge--pill">' + status[data].title + '</span>';
                //     },
                // },
                // {
                //     targets: -2,
                //     render: function (data, type, full, meta) {
                //         var status = {
                //             1: {
                //                 'title': 'Online',
                //                 'state': 'danger'
                //             },
                //             2: {
                //                 'title': 'Retail',
                //                 'state': 'primary'
                //             },
                //             3: {
                //                 'title': 'Direct',
                //                 'state': 'success'
                //             },
                //         };
                //         if (typeof status[data] === 'undefined') {
                //             return data;
                //         }
                //         return '<span class="kt-badge kt-badge--' + status[data].state + ' kt-badge--dot"></span>&nbsp;' +
                //             '<span class="kt-font-bold kt-font-' + status[data].state + '">' + status[data].title + '</span>';
                //     },
                // },
            ],
        });
    };

    return {

        //main function to initiate the module
        init: function () {
            initTable1();
        },

    };

}();

jQuery(document).ready(function () {
    KTDatatablesDataSourceAjaxServer.init();
});