@extends('front.master')

@section('content')
	<div class="kt-grid kt-grid--ver kt-grid--root">
		<div class="kt-grid kt-grid--hor kt-grid--root  kt-login kt-login--v3 kt-login--signin" id="kt_login">
			<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" style="background-image: url(assets/media//bg/bg-3.jpg);">
				<div class="kt-grid__item kt-grid__item--fluid kt-login__wrapper">
					<div class="kt-login__container">
						<div class="kt-login__logo">
							<a href="#">
								<img src="assets/media/logos/logo-5.png" alt="logo">
							</a>
						</div>
						<div class="kt-login__signin">
							<div class="kt-login__head">
								<h3 class="kt-login__title">Sign In To Admin</h3>
							</div>
						<form class="kt-form" method="post">
								<div class="input-group">
									<input class="form-control" type="text" placeholder="Username / Email" name="username" autocomplete="off">
								</div>
								<div class="input-group">
									<input class="form-control" type="password" placeholder="Password" name="password">
								</div>
								<div class="row kt-login__extra">
									<div class="col">
										<label class="kt-checkbox">
											<input type="checkbox" name="remember"> Remember me
											<span></span>
										</label>
									</div>
									<div class="col kt-align-right">
										<a href="javascript:;" id="kt_login_forgot" class="kt-login__link">Forget Password ?</a>
									</div>
								</div>
								<div class="kt-login__actions">
									<button id="kt_login_signin_submit" class="btn btn-brand btn-elevate kt-login__btn-primary">Sign In</button>
								</div>
							</form>
						</div>
						{{-- <div class="kt-login__signup">
							<div class="kt-login__head">
								<h3 class="kt-login__title">Sign Up</h3>
								<div class="kt-login__desc">Enter your details to create your account:</div>
							</div>
							<form class="kt-form" method="post">
								<div class="input-group">
									<input class="form-control" type="text" placeholder="Fullname" name="fullname">
								</div>
								<div class="input-group">
									<input class="form-control" type="text" placeholder="Email" name="email" autocomplete="off">
								</div>
								<div class="input-group">
									<input class="form-control" type="password" placeholder="Password" name="password">
								</div>
								<div class="input-group">
									<input class="form-control" type="password" placeholder="Confirm Password" name="rpassword">
								</div>
								<div class="row kt-login__extra">
									<div class="col kt-align-left">
										<label class="kt-checkbox">
											<input type="checkbox" name="agree">I Agree the <a href="#" class="kt-link kt-login__link kt-font-bold">terms and conditions</a>.
											<span></span>
										</label>
										<span class="form-text text-muted"></span>
									</div>
								</div>
								<div class="kt-login__actions">
									<button id="kt_login_signup_submit" class="btn btn-brand btn-elevate kt-login__btn-primary">Sign Up</button>&nbsp;&nbsp;
									<button id="kt_login_signup_cancel" class="btn btn-light btn-elevate kt-login__btn-secondary">Cancel</button>
								</div>
							</form>
						</div> --}}
						<div class="kt-login__forgot">
							<div class="kt-login__head">
								<h3 class="kt-login__title">Forgotten Password ?</h3>
								<div class="kt-login__desc">Enter your email to reset your password:</div>
							</div>
							<form class="kt-form" method="post">
								<div class="input-group">
									<input class="form-control" type="text" placeholder="Email" name="email" id="kt_email" autocomplete="off">
								</div>
								<div class="kt-login__actions">
									<button id="kt_login_forgot_submit" class="btn btn-brand btn-elevate kt-login__btn-primary">Request</button>&nbsp;&nbsp;
									<button id="kt_login_forgot_cancel" class="btn btn-light btn-elevate kt-login__btn-secondary">Cancel</button>
								</div>
							</form>
						</div>
						{{-- <div class="kt-login__account">
							<span class="kt-login__account-msg">
								Don't have an account yet ?
							</span>
							&nbsp;&nbsp;
							<a href="javascript:;" id="kt_login_signup" class="kt-login__account-link">Sign Up!</a>
						</div> --}}
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- end:: Page -->

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
	</script>
@endsection
