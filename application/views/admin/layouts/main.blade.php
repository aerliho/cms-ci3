@php
$CI =& get_instance();
@endphp

@extends('admin.master')
@include('admin.layouts.partials.header')
@include('admin.layouts.partials.header_mobile')
@include('admin.layouts.partials.aside')
@include('admin.layouts.partials.subheader')

@section('layout')
	<!-- begin:: Header Mobile -->

	@yield('header_mobile')

	<!-- end:: Header Mobile -->
	<div class="kt-grid kt-grid--hor kt-grid--root">
		<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">

			<!-- begin:: Aside -->
				@yield('aside')

			<!-- end:: Aside -->

			<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">

				<!-- begin:: Header -->
				@yield('header')

				<!-- end:: Header -->
				<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">

					<!-- begin:: Subheader -->
					@yield('subheader')

					<!-- end:: Subheader -->

					<!-- begin:: Content -->
					<div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
						@yield('content')
					</div>

					<!-- end:: Content -->
				</div>

				<!-- begin:: Footer -->

				<!-- end:: Footer -->
			</div>
		</div>
	</div>

	<!-- end:: Page -->
	@section('bottom_page')
		@yield('scrolltop',$CI->blade->make('admin.layouts.partials.scrolltop'))
	@show
		
@endsection
