<!doctype html>
<html lang="en">



<head>
	

	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" href="{{ asset( $company->company_logo) }}" type="image/png">
	<title>{{ $company->company_name }}</title>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="{{ asset('assets/frontend/css/bootstrap.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/frontend/vendors/linericon/style.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/frontend/css/font-awesome.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/frontend/vendors/owl-carousel/owl.carousel.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/frontend/vendors/lightbox/simpleLightbox.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/frontend/vendors/nice-select/css/nice-select.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/frontend/vendors/nice-select/css/nice-select.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/frontend/vendors/jquery-ui/jquery-ui.css') }}">
	<!-- main css -->
	<link rel="stylesheet" href="{{ asset('assets/frontend/css/style.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/frontend/css/responsive.css') }}">






</head>

<body>

	<!-- add modal start -->
    

	<!-- Modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Search</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>

	      <form action="{{ route('search') }}" method="POST">

	      	{{ csrf_field() }}
	      <div class="modal-body">

	      		
		        
				  <div class="form-group">
				    <label>Search Product:</label>
				    <input type="text" name="search" class="form-control">
				  </div>

				  <!-- <div class="form-group">
				    <label>Salary</label>
				    <input type="text" name="salary" class="form-control">
				  </div> -->
		
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        <button type="submit" class="btn btn-primary">Search Product</button>
	      </div>
	      </form>

	    </div>
	  </div>
	</div>
<!-- add modal end -->

	<!--================Header Menu Area =================-->
	<header class="header_area">
		<div class="top_menu row m0">
			<div class="container-fluid">
				<div class="float-left">
					<p>Call Us: {{ $company->company_phone }}
					</p>

				</div>

				<div class="float-right">
					<ul class="right_side">
						
						@if(!Auth::guard('customer')->user())
						<li>
							<a href="{{ route('login.customer') }}">
								Login/Register
							</a>
						</li>
						@endif
						@if(Auth::guard('customer')->user())
						<li>
						<a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();""><i class="ti-power-off"></i><span> Logout</span></a>

            						<form id="logout-form" action="{{ route('customer-logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                        </li>
						@endif

						@if(Auth::guard('customer')->user())

						<li>
							<a href="{{ route('customer.home') }}">
								My Account
							</a>
						</li>
						@endif
						
						<li>
							
	
						<div class="f_social">
							<a href="https://www.facebook.com/Khadem.islamic.shop" target="_blank">
								<i class="fa fa-facebook"></i>
							</a>
							
						</div>

						</li>
						<li>
							
								<i class="fa fa-envelope"></i> <span>{{ $company->company_email }}
								</span>

						</li>
						
						
					</ul>
				</div>
			</div>
		</div>
		<div class="main_menu">
			<nav class="navbar navbar-expand-lg navbar-light">
				<div class="container-fluid">
					<!-- Brand and toggle get grouped for better mobile display -->
					<a class="navbar-brand logo_h" href="{{ route('index') }}">
						<img src="{{ asset( $company->company_logo) }}" alt="" style="height: 80px; width: 120px;">
					</a>

					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
					 aria-expanded="false" aria-label="Toggle navigation">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
						<div class="row w-100">
							<div class="col-lg-7 pr-0">
								<ul class="nav navbar-nav center_nav pull-right">
									<li class="nav-item active">
										<a class="nav-link" href="{{ route('index') }}">Home</a>
									</li>
									<li class="nav-item submenu dropdown">
										<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Categories</a>
										<ul class="dropdown-menu">
											<li class="nav-item">
												
												<li class="nav-item">
													
													<li class="nav-item">
														@foreach($category as $row)
														@if($row->status == 1)
														<li class="nav-item">
															<a class="nav-link" href="{{ route('products', $row->id) }}">{{ $row->category_name }}</a>
														</li>
														@endif
														@endforeach
														
										</ul>
									</li>

									<li class="nav-item submenu dropdown">
										<a href="{{ route('shop') }}" class="nav-link dropdown-toggle">Shop</a>
									
									</li>
									<li class="nav-item submenu dropdown">
										<a href="{{ route('contact') }}" class="nav-link dropdown-toggle">Contact</a>
									
									</li>
									<!-- <li class="nav-item submenu dropdown">
										<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Pages</a>
										
									</li> -->
									<!-- <li class="nav-item">
										<a class="nav-link" href="contact.html">Contact</a>
									</li> -->
								</ul>
							</div>

							<div class="col-lg-5">

								@php

								$quantity = App\Cart::where('user_ip', request()->ip())->sum('product_quantity');
								@endphp
								<ul class="nav navbar-nav navbar-right right_nav pull-right">
									<hr>
									<!-- <li class="nav-item">
										<a href="" class="icons">
											<i class="fa fa-search" ></i>
										</a>
									</li> -->

									<hr>
									<li class="nav-item">
										<a href="#" class="icons" data-toggle="modal" data-target="#exampleModal">
											<i class="fa fa-search" aria-hidden="true"  data-toggle="modal" data-target="#exampleModal"></i>
										</a>
									</li>

									<hr>

									@if(Auth::guard('customer')->user())
									<li class="nav-item">
										<a href="{{ route('customer.home') }}" class="icons">
											<i class="fa fa-user" aria-hidden="true"></i>
										</a>
									</li>
									@endif
									<hr>
									@if(!Auth::guard('customer')->user())
									<li class="nav-item">
										<a href="{{ route('login.customer') }}" class="icons">
											<i class="fa fa-user" aria-hidden="true"></i>
										</a>
									</li>
									@endif

									
									<hr>
									

									<li class="nav-item">
										<a href="{{ route('cart-page') }}" class="icons">
											<i class="lnr lnr lnr-cart"></i>
											@if($quantity)
											<span>{{ $quantity }}</span>
											@endif

										</a>
									</li>



									<hr>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</nav>
		</div>
	</header>
	<!--================Header Menu Area =================-->

	@yield('home_content')

	<!--================ start footer Area  =================-->
	<footer class="footer-area section_gap">
		<div class="container">
			<div class="row">
				<div class="col-lg-3  col-md-6 col-sm-6">
					<div class="single-footer-widget">
						<h6 class="footer_title">About Us</h6>
						<p>{{ $company->company_description }}
						</p>
					</div>
				</div>
				
				<hr>
				<div class="col-lg-2 col-md-6 col-sm-6">
					<div class="single-footer-widget f_social_wd">
						<h6 class="footer_title">Follow Us</h6>
						<p>Let us be social</p>
						<div class="f_social">
							<a href="https://www.facebook.com/Khadem.islamic.shop" target="_blank">
								<i class="fa fa-facebook"></i>
							</a>
							
						</div>
					</div>
				</div>
				<hr>
					<div class="single-footer-widget f_social_wd">
						<h6 class="footer_title">Mail Us</h6>
						
						
							
								<i class="fa fa-envelope"></i>  <span>{{ $company->company_email }}
</span>
							
							
						
					</div>
					<hr>
					<div class="single-footer-widget f_social_wd">
						<h6 class="footer_title">Address</h6>
						
						
							
								<i class="lnr lnr-home"></i>  <span>{{ $company->company_address }}
</span>
							
							
						
					</div>
				
			</div>
			<div class="row footer-bottom d-flex justify-content-between align-items-center">
				<p class="col-lg-12 footer-text text-center"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy; {{ $company->company_name }}. All rights reserved.<br>
Software By Dream Technologies. | Phone: 01521100281
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
				</p>
			</div>
		</div>
	</footer>
	<!--================ End footer Area  =================-->



	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="{{ asset('assets/frontend/js/jquery-3.2.1.min.js') }}"></script>
	<script src="{{ asset('assets/frontend/js/popper.js') }}"></script>
	<script src="{{ asset('assets/frontend/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('assets/frontend/js/stellar.js') }}"></script>
	<script src="{{ asset('assets/frontend/vendors/lightbox/simpleLightbox.min.js') }}"></script>
	<script src="{{ asset('assets/frontend/vendors/nice-select/js/jquery.nice-select.min.js') }}"></script>
	<script src="{{ asset('assets/frontend/vendors/isotope/imagesloaded.pkgd.min.js') }}"></script>
	<script src="{{ asset('assets/frontend/vendors/isotope/isotope-min.js') }}"></script>
	<script src="{{ asset('assets/frontend/vendors/owl-carousel/owl.carousel.min.js') }}"></script>
	<script src="{{ asset('assets/frontend/js/jquery.ajaxchimp.min.js') }}"></script>
	<script src="{{ asset('assets/frontend/vendors/counter-up/jquery.waypoints.min.js') }}"></script>

	<script src="{{ asset('assets/frontend/vendors/flipclock/timer.js') }}"></script>
	
	<script src="{{ asset('assets/frontend/vendors/counter-up/jquery.counterup.js') }}"></script>
	<script src="{{ asset('assets/frontend/js/mail-script.js') }}"></script>

	<script src="{{ asset('assets/frontend/js/theme.js') }}"></script>


</body>

</html>