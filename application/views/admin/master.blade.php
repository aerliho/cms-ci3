<!DOCTYPE html>
<html lang="en">

<!-- begin::Head -->

<head>
	<!--end::Base Path -->
	<meta charset="utf-8" />
	<title> {{$app_name}} | {{$page_name}}</title>

	<meta name="description" content="{{$meta_description}}">
	<meta name="keywords" content="{{$meta_keywords}}">
	<meta name="author" content="{{$meta_author}}">

	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!--begin::Fonts -->
	<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
	<script>
		WebFont.load({
			google: {
				"families": ["Poppins:300,400,500,600,700", "Roboto:300,400,500,600,700"]
			},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!--end::Fonts -->
	<!--begin::Page Vendors Styles(used by this page) -->
	<link href="{{$base_url}}assets/vendors/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />

	<!--end::Page Vendors Styles -->

	<!--begin::Global Theme Styles(used by all pages) -->
	<link href="{{$base_url}}assets/vendors/global/vendors.bundle.css" rel="stylesheet" type="text/css" />
	<link href="{{$base_url}}assets/css/demo1/style.bundle.css" rel="stylesheet" type="text/css" />

	<!--end::Global Theme Styles -->

	<!--begin::Layout Skins(used by all pages) -->
	<link href="{{$base_url}}assets/css/demo1/skins/header/base/light.css" rel="stylesheet" type="text/css" />
	<link href="{{$base_url}}assets/css/demo1/skins/header/menu/light.css" rel="stylesheet" type="text/css" />
	<link href="{{$base_url}}assets/css/demo1/skins/brand/dark.css" rel="stylesheet" type="text/css" />
	<link href="{{$base_url}}assets/css/demo1/skins/aside/dark.css" rel="stylesheet" type="text/css" />

	<!--end::Layout Skins -->
	<link rel="shortcut icon" href="{{$base_url}}assets/media/logos/favicon.ico" />

	@section('css_bundle')
		{!! $css_bundle !!}
		
	@show

</head>
	
<!-- end::Head -->

<!-- begin::Body -->

<body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--fixed kt-subheader--enabled kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">
	<!-- begin:: Page -->
	@yield('layout')
	<!-- begin::Global Config(global config for global JS sciprts) -->
	<script>
		var KTAppOptions = {
				"colors": {
					"state": {
						"brand": "#5d78ff",
						"dark": "#282a3c",
						"light": "#ffffff",
						"primary": "#5867dd",
						"success": "#34bfa3",
						"info": "#36a3f7",
						"warning": "#ffb822",
						"danger": "#fd3995"
					},
					"base": {
						"label": ["#c5cbe3", "#a1a8c3", "#3d4465", "#3e4466"],
						"shape": ["#f0f3ff", "#d9dffa", "#afb4d4", "#646c9a"]
					}
				}
			};

		var auth = @json($auth);
		var this_controller = '{{$this_controller}}';


	</script>

	<!-- end::Global Config -->


	<!--begin::Global Theme Bundle(used by all pages) -->
	<script src="{{$base_url}}assets/vendors/global/vendors.bundle.js" type="text/javascript"></script>
	<script src="{{$base_url}}assets/js/demo1/scripts.bundle.js" type="text/javascript"></script>

	<!--end::Global Theme Bundle -->

	<!--begin::Page Vendors(used by this page) -->
	<script src="{{$base_url}}assets/vendors/custom/fullcalendar/fullcalendar.bundle.js" type="text/javascript">
	</script>
	<script src="//maps.google.com/maps/api/js?key=AIzaSyBTGnKT7dt597vo9QgeQ7BFhvSRP4eiMSM" type="text/javascript">
	</script>
	<script src="{{$base_url}}assets/vendors/custom/gmaps/gmaps.js" type="text/javascript"></script>

	<!--end::Page Vendors -->

	<!--begin::Page Scripts(used by this page) -->
	<script src="{{$base_url}}assets/js/demo1/pages/dashboard.js" type="text/javascript"></script>

	<!--end::Page Scripts -->
	@section('js_bundle')
		{!! $js_bundle !!}
	@show
</body>

<!-- end::Body -->

</html>