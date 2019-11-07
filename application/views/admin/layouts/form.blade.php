@php
$CI =& get_instance();

@endphp
@section('form')
    <div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
        <div class="row">
            <div class="col-lg-12 col-xl-12">

                <!--begin::Portlet-->
                <div class="kt-portlet">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">                            
                                {{-- {{$form['name'] }} --}}
                                {{$form['name'] ? $form['name']: $breadcrumb }}
                            </h3>
                        </div>
                    </div>

                    <!--begin::Form-->
                <form class="kt-form"  action="{{$form['action']}}" back-url="{{isset($form['back-url']) ? $form['back-url'] : ''}}">
                        <div class="kt-portlet__body">
                            @foreach ($form['list'] as $item)
                                @includeWhen($item['type'] == 'input', 'admin.layouts.component.input', ['data' => $item])
                                @includeWhen($item['type'] == 'select', 'admin.layouts.component.select', ['data' => $item])
                                @includeWhen($item['type'] == 'textarea', 'admin.layouts.component.textarea', ['data' => $item])
                                @includeWhen($item['type'] == 'fileupload', 'admin.layouts.component.fileupload', ['data' => $item])

                            @endforeach
                        </div>  
                        
                        <div class="kt-portlet__foot">
                            <div class="kt-form__actions">
                                <button type="button" class="btn btn-success my-btn-submit">Submit</button>
                                <button type="button" class="btn btn-secondary my-btn-cancel">Cancel</button>
                            </div>
                        </div>
                    </form>

                    <!--end::Form-->
                </div>

                <!--end::Portlet-->
            </div>
        </div>
    </div>
@endsection


@section('js_bundle')
    @parent

    <script src="{{$base_url}}assets/vendors/custom/parsley/parsley.min.js" type="text/javascript"></script>
    <script src="{{$base_url}}assets/js/admin/my_form.js" type="text/javascript"></script>

    {{-- datetimepicker --}}
    <script src="{{$base_url}}assets/js/demo1/pages/crud/forms/widgets/bootstrap-datetimepicker.js" type="text/javascript"></script>
    {{-- ckeditor --}}
    <script src="{{$base_url}}assets/vendors/custom/ckeditor/ckeditor.js" type="text/javascript"></script>
    <script src="{{$base_url}}assets/vendors/custom/ckfinder/ckfinder.js"></script>
    
    <script src="{{$base_url}}assets/js/admin/my_upload.js"></script>

    <script >
        jQuery(document).ready(function () {

            MY_form.select2('.my_select');    

            MY_form.datetime('.my_datetime');    
            MY_form.date('.my_date');    
            MY_form.time('.my_time');    

            MY_form.ckeditor('.my_ckeditor')
        })
    </script>

@endsection