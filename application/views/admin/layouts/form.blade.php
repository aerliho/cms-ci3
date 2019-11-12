@php
$CI =& get_instance();

@endphp
@section('form')
    <!--begin::Form-->
    <form class="kt-form" action="{{$form['action']}}" back-url="{{isset($form['back-url']) ? $form['back-url'] : ''}}">
        <div class="kt-portlet__body">
            @foreach ($form['list'] as $item)
                @includeWhen($item['type'] == 'input', 'admin.layouts.component.input', ['data' => $item])
                @includeWhen($item['type'] == 'datetime', 'admin.layouts.component.input', ['data' => $item])
                @includeWhen($item['type'] == 'date', 'admin.layouts.component.input', ['data' => $item])
                @includeWhen($item['type'] == 'time', 'admin.layouts.component.input', ['data' => $item])
                @includeWhen($item['type'] == 'select', 'admin.layouts.component.select', ['data' => $item])
                @includeWhen($item['type'] == 'ckeditor', 'admin.layouts.component.textarea', ['data' => $item])
                @includeWhen($item['type'] == 'textarea', 'admin.layouts.component.textarea', ['data' => $item])
                @includeWhen($item['type'] == 'fileupload', 'admin.layouts.component.fileupload', ['data' => $item])
                @includeWhen($item['type'] == 'imagemanager', 'admin.layouts.component.imagemanager', ['data' => $item])
            @endforeach
        </div>

        <div class="kt-portlet__foot">
            <div class="kt-form__actions">
                <button type="button" class="btn btn-success my-btn-submit">Submit</button>
                <button type="button" class="btn btn-secondary my-btn-cancel">Cancel</button>
            </div>
        </div>
    </form>
@endsection


@section('js_bundle')
@parent

<script src="{{$base_url}}assets/vendors/custom/parsley/parsley.min.js" type="text/javascript"></script>
<script src="{{$base_url}}assets/js/admin/my_form.js" type="text/javascript"></script>

@isset($form['hasdatetime'])
    <script src="{{$base_url}}assets/js/demo1/pages/crud/forms/widgets/bootstrap-datetimepicker.js" type="text/javascript"></script>
@endisset
@isset($form['hasckeditor'])
    <script src="{{$base_url}}assets/vendors/custom/ckeditor/ckeditor.js" type="text/javascript"></script>
@endisset

@isset($form['hasimagemanager'])
    <script src="{{$base_url}}assets/vendors/custom/ckfinder/ckfinder.js"></script>
@endisset

@isset($form['hasimagemanager'])
    @section('additional_html')
        @parent
        @include('admin.layouts.component._listImagemanager')
    @endsection

@endisset

@isset($form['hasfileupload'])
    @section('additional_html')
        @parent
            @include('admin.layouts.component._listFileupload')
        @endsection
@endisset
{{-- datetimepicker --}}
{{-- ckeditor --}}

{{-- <script src="{{$base_url}}assets/js/admin/my_upload.js"></script> --}}

<script>
    jQuery(document).ready(function () {
        if ("{{ isset($form['hasselect']) ? 'true' : '' }}" != '') {
            MY_form.select2('.my_select'); 
        }
        if ("{{ isset($form['hasdatetime']) ? 'true' : '' }}" != '') {
            MY_form.datetime('.my_datetime');
        }
        if ("{{ isset($form['hasdate']) ? 'true' : '' }}" != '') {
            MY_form.date('.my_date');    
        }
        if ("{{ isset($form['hastime']) ? 'true' : '' }}" != '') {
            MY_form.time('.my_time');    
        }
        if ("{{ isset($form['hasckeditor']) ? 'true' : '' }}" != '') {
            MY_form.ckeditor('.my_ckeditor')
        }
        if ("{{ isset($form['hasfileupload']) ? 'true' : '' }}" != '') {
            MY_form.fileupload('.my_fileUpload')
        }
        if ("{{ isset($form['hasimagemanager']) ? 'true' : '' }}" != '') {
            MY_form.imagemanager('.my_Imagemanager')
        }
    })
</script>

@endsection