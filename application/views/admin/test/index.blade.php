@extends('admin.layouts.main')
@php
$CI =& get_instance();
@endphp
@section('content')

    <div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__head kt-portlet__head--lg">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon">
                    <i class="kt-font-brand flaticon2-line-chart"></i>
                </span>
                <h3 class="kt-portlet__head-title">
                    {{$page_name}}
                </h3>
            </div>
            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-wrapper">
                    <div class="kt-portlet__head-actions">
                        {{-- <a href="{{$this_controller}}export" class="kt-nav__link">
                            <i class="kt-nav__link-icon la la-excel"></i>
                            <span class="kt-nav__link-text">Export Excel</span>
                        </a>
                        &nbsp; --}}
                        <a href="{{$this_controller}}add" class="btn btn-brand btn-elevate btn-icon-sm">
                            <i class="la la-plus"></i>
                            New Record
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="kt-portlet__body">
    
            <!--begin: Datatable -->
            <table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Detail</th>
                        <th>Actions</th>
                    </tr>
                </thead>
            </table>
    
            <!--end: Datatable -->
        </div>
    </div>
@endsection

@section('js_bundle')
    @parent 
    <script src="{{$base_url}}assets/vendors/custom/datatables/datatables.bundle.js"></script>
    <script src="{{$base_url}}assets/js/admin/MY_record.js"></script>
    <script src="{{$base_url}}assets/js/admin/test/test.js"></script>
@endsection

@section('css_bundle')
    @parent 
    <link href="{{$base_url}}assets/vendors/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
@endsection