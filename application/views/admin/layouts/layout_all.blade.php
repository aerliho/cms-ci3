@php
$CI =& get_instance();
@endphp

@extends('admin.master')

@section('layout')
	<!-- begin:: Header Mobile -->

	@yield('header_mobile',$CI->blade->make('admin.partials.header_mobile'))

	<!-- end:: Header Mobile -->
	<div class="kt-grid kt-grid--hor kt-grid--root">
		<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">

			<!-- begin:: Aside -->
			@section('aside')
				@yield('aside',$CI->blade->make('admin.partials.aside'))
			@show
			{{-- @yield('aside',) --}}

			<!-- end:: Aside -->
			<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">

				<!-- begin:: Header -->
				@yield('header',$CI->blade->make('admin.partials.header'))

				<!-- end:: Header -->
				<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">

					<!-- begin:: Subheader -->
					@yield('subheader',$CI->blade->make('admin.partials.subheader'))

					<!-- end:: Subheader -->

					<!-- begin:: Content -->
					<div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
						@yield('content')
					</div>

					<!-- end:: Content -->
				</div>

				<!-- begin:: Footer -->
				@yield('footer',$CI->blade->make('admin.partials.footer'))

				<!-- end:: Footer -->
			</div>
		</div>
	</div>

	<!-- end:: Page -->
	@section('bottom_page')
		@yield('scrolltop',$CI->blade->make('admin.partials.scrolltop'))
		<!-- begin::Quick Panel -->
			@yield('quick_panel',$CI->blade->make('admin.partials.quick_panel'))
		
			<!-- end::Quick Panel -->
			
			<!-- begin::Sticky Toolbar -->
			@yield('sticky_toolbar',$CI->blade->make('admin.partials.sticky_toolbar'))
			
			<!-- end::Sticky Toolbar -->
	@show
		
@endsection
