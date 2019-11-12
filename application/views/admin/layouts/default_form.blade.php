@include('admin.layouts.form')

@section('form_layout')
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
                @yield('form')
            </div>

            <!--end::Portlet-->
        </div>
    </div>
</div>
@endsection