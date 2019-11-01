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
                                @component('admin.layouts.component.input',['input'=>$item]) @endcomponent

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
    <script src="{{$base_url}}assets/js/my_form.js" type="text/javascript"></script>

@endsection