@extends('layouts.frontend')

@section('home_content')

	<!--================Home Banner Area =================-->

	<section class="home_banner_area">

		<div class="overlay"></div>
		
		<div class="banner_inner d-flex align-items-center">
			<div class="container">

				<div class="banner_content row">
					<div class="offset-lg-2 col-lg-8">
						<h3>{{ $company->company_name }}</h3>
						<p>{{ $company->company_description }}
						</p>
						<a class="white_bg_btn" href="{{ route('shop') }}">View Collection</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Home Banner Area =================-->

	<!--================Hot Deals Area =================-->

	
	<section class="hot_deals_area section_gap">
		<div class="container-fluid">
			<div class="row">
				<div class="main_title">
					<h2>New Arrival</h2>
				</div>
			</div>
			
			<div class="row">
				
				@foreach($category_limit as $val)
				
				<a href="{{ route('products', $val->id) }}">
				<div class="col-lg-6">
					<div class="hot_deal_box">
						
						<img class="img-fluid" src="{{ asset('assets/frontend/img/product/hot_deals/section.png') }}" alt="">
						
						<div class="content">
							<h2>{{ $val->category_name }}</h2>
							<p>shop now</p>
						</div>
						<a class="hot_deal_link" href="{{ route('products', $category['0']->id) }}"></a>
					</div>
				</div>
				</a>
				
				@endforeach
				<!-- <a href="{{ route('products', $category['1']->id) }}"> -->
				<!-- <div class="col-lg-6">
					<div class="hot_deal_box">
						<img class="img-fluid" src="{{ asset('assets/frontend/img/product/hot_deals/section.png') }}" alt="">
						<div class="content">
							<h2>{{ $category['1']->category_name }}</h2>
							<p>shop now</p>
						</div>
						<a class="hot_deal_link" href="{{ route('products', $category['1']->id) }}"></a>
					</div>
				</div> -->
				</a>

			</div>

		</div>
	</section>
	<!--================End Hot Deals Area =================-->

	<!--================Clients Logo Area =================-->
	<section class="clients_logo_area">
		<div class="container-fluid">
			<div class="row">
				<div class="main_title">
					<h2>Discounted Items</h2>
				</div>
			</div>
			
			<div class="owl-carousel clients_slider">
			
			@foreach($discount as $val)
				<div class="item">

					<div class="col col1">
						<div class="f_p_item">
							<div class="f_p_img">
								<a href="{{ route('detail', $val->id) }}">
								<img class="img-fluid" src="{{ asset($val->product_image) }}" alt="" style="height: 200px; width: 200px;">
								</a>
								<div class="p_icon">
									@if($val->status == 1)
									<form action="{{ route('add-to-cart', $val->id) }}" method="post">
									@csrf

  									
									
									<button type="submit"><i class="lnr lnr-cart"></i></button>


									<input type="hidden" name="product_price" value="{{ $val->product_price}}">
									</form>
									@endif
								</div>
							</div>
							<a href="{{ route('detail', $val->id) }}">
								<h4>{{ $val->product_name }}</h4>
							</a>
							@if($val->product_price_prev)
							<h6><del>৳{{ $val->product_price_prev }}</del></h6>
							@endif

							<h5>৳{{ $val->product_price }}</h5>
							
						</div>
					</div>
				</div>
			@endforeach
			
				
			</div>
		</div>
	</section>
	<!--================End Clients Logo Area =================-->

	<!--================Feature Product Area =================-->

	
	@foreach($category as $key)
	@if($key->status == 1)
	<section class="feature_product_area section_gap" id="products">
		<div class="main_box">
			<div class="container-fluid">
				
				<div class="row">
					<div class="main_title">
						
						<h2>{{ $key->category_name }}</h2>
						<p>{{ $key->category_description }}</p>
						<p><a href="{{ route('products', $key->id) }}" type="submit" class="btn btn-primary">View All</a></p>
					</div>
				</div>
				<div class="row" id="product">

					@php($i=1)



					

					@foreach($product as $row)

					@if($row->category_id == $key->id && $row->count() > 0)
					
					<div class="col col1">
						<div class="f_p_item">
							<div class="f_p_img">
								<a href="{{ route('detail', $row->id) }}">
								<img class="img-fluid" src="{{ asset($row->product_image) }}" alt="" style="height: 200px; width: 200px;">
								</a>
								<div class="p_icon">
									<!-- <a href="{{ route('detail', $row->id) }}">
										<i class="lnr lnr-heart"></i>
										
									</a> -->
									@if($row->status == 1)
									<form action="{{ route('add-to-cart', $row->id) }}" method="post">
									@csrf

									
									
									<button type="submit"><i class="lnr lnr-cart"></i></button>


									<input type="hidden" name="product_price" value="{{ $row->product_price}}">
									</form>
									@endif
								</div>
							</div>
							<a href="{{ route('detail', $row->id) }}">
								<h4>{{ $row->product_name }}</h4>
							</a>
							@if($row->product_price_prev)
							<h6><del>৳{{ $row->product_price_prev }}</del></h6>
							@endif

							<h5>৳{{ $row->product_price }}</h5>
							
						</div>
					</div>
					@endif
					
					
					@endforeach

					
					
		
				</div>

				<div class="row">
					<nav class="cat_page mx-auto" aria-label="Page navigation example">
						
					</nav>
				</div>
			</div>
		</div>
	</section>
	@endif
	@endforeach
	
	<!--================End Feature Product Area =================-->

	<!--================ Subscription Area ================-->
	
	<!--================ End Subscription Area ================-->

@endsection