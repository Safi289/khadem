@extends('layouts.frontend')

@section('home_content')
	
		<!--================Home Banner Area =================-->
	<section class="banner_area">
		<div class="banner_inner d-flex align-items-center">
			<div class="container">
				<div class="banner_content text-center">
					<h2>Login/Register</h2>
					<div class="page_link">
						<a href="index.html">Home</a>
						<a href="registration.html">Register</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Home Banner Area =================-->

	<!--================Login Box Area =================-->
	<section class="login_box_area p_120">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="login_box_img">
						<img class="img-fluid" src="{{ asset('assets/frontend/img/login.jpg') }}" alt="">
						<div class="hover">
							<h4>Already Registered our website?</h4>
							
							<a class="main_btn" href="{{ route('login.customer') }}">Login</a>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="login_form_inner reg_form">
						@include('includes.message')
						<h3>Create an Account</h3>
						<form class="row login_form" action="{{ route('customer-registration') }}" method="post" id="contactForm" novalidate="novalidate">
							@csrf
							<div class="col-md-12 form-group">
								<input type="text" class="form-control" id="name" name="name" placeholder="Name" required="">
							</div>
							<div class="col-md-12 form-group">
								<input type="email" class="form-control" id="email" name="email" placeholder="Email Address" required="">
							</div>
							<div class="col-md-12 form-group">
								<input type="password" class="form-control" id="password" name="password" placeholder="Password" required="">
							</div>
							<!-- <div class="col-md-12 form-group">
								<input type="password" class="form-control" id="pass" name="pass" placeholder="Confirm password">
							</div> -->
							<!-- <div class="col-md-12 form-group">
								<div class="creat_account">
									<input type="checkbox" id="f-option2" name="selector">
									<label for="f-option2">Keep me logged in</label>
								</div>
							</div> -->
							<div class="col-md-12 form-group">
								<button type="submit" value="submit" class="btn submit_btn">Register</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Login Box Area =================-->

@endsection