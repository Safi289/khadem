@extends('layouts.frontend')

@section('home_content')

	<!--================Home Banner Area =================-->
	<section class="banner_area">
		<div class="banner_inner d-flex align-items-center">
			<div class="container">
				<div class="banner_content text-center">
					<h2>Product Detail</h2>
					<div class="page_link">
						<a href="{{ route('index') }}">Home</a>
						<!-- <a href="category.html"></a> -->
						<a href="#">Product Details</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Home Banner Area =================-->

	<!--================Single Product Area =================-->
	<div class="product_image_area">
		<div class="container">
			<div class="row s_product_inner">
				<div class="col-lg-6">
					<div class="s_product_img">
						<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
							<ol class="carousel-indicators">
								
								
								
							</ol>
							<div class="carousel-inner">
								<div class="carousel-item active">
									<img class="d-block w-100" src="{{ asset($product->product_image) }}" alt="First slide">
								</div>
								
								
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-5 offset-lg-1">
					<div class="s_product_text">
						<h3>{{ $product->product_name }}</h3>

						@if($product->writer)
						<h4>By {{ $product->writer }}</h4>
						@endif

						@if($product->product_price_prev)
						<h2><del>৳{{ $product->product_price_prev }}</del></h2>
						@endif
						<h2>৳{{ $product->product_price }}
							@if($product->product_unit)
							/{{ $product->product_quantity }}
							{{ $product->product_unit }}
							@endif
						</h2>
						
						
						
						<!-- <h2>{{ $product->product_quantity }}</h2> -->
						<ul class="list">
							<li>
								<a class="active" href="{{ route('products', $product->category_id) }}">
									<span>Category</span> : {{ $product->category_name }}</a>
							</li>
							@if($product->size)
							<li>
									<a href="#">
									<span>Size</span> : {{ $product->size}}
									</a>
							</li>
							@endif

							@if($product->publisher)
							<li>
									<a href="#">
									<span>Publisher</span> : {{ $product->publisher}}
									</a>
							</li>
							@endif

							@if($product->page_no)
							<li>
									<a href="#">
									<span>No. of pages</span> : {{ $product->page_no}}
									</a>
							</li>
							@endif

							<li>
								@if($product->status == 1)
								<a href="#">
									<span>Availibility</span> : In Stock</a>
								@endif
								@if($product->status == 0)
								<a href="#">
									<span>Availibility</span> : Out of Stock</a>
								@endif
							</li>
						</ul>
						<p>{{ $product->product_description }}</p>
						<!-- <div class="product_count">
							<label for="qty">Quantity:</label>
							<input type="text" name="qty" id="sst" maxlength="12" value="1" title="Quantity:" class="input-text qty">
							<button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;"
							 class="increase items-count" type="button">
								<i class="lnr lnr-chevron-up"></i>
							</button>
							<button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 0 ) result.value--;return false;"
							 class="reduced items-count" type="button">
								<i class="lnr lnr-chevron-down"></i>
							</button>
						</div> -->
						@if($product->status == 1)
						<div class="card_area">

									<form action="{{ route('add-cart-quantity', $product->id) }}" method="post">
									@csrf
									<label for="quantity">Quantity:</label>
  									<input type="number" id="quantity" name="quantity" min="1" value="1">
									<button type="submit" class="main_btn">Add To Cart</button>
									<input type="hidden" name="product_price" value="{{ $product->product_price}}">
									</form>

							
							<!-- <a class="icon_btn" href="#">
								<i class="lnr lnr lnr-diamond"></i>
							</a>
							<a class="icon_btn" href="#">
								<i class="lnr lnr lnr-heart"></i>
							</a> -->
						</div>
						@endif

					</div>
				</div>
			</div>
		</div>
	</div>
	<!--================End Single Product Area =================-->

	<!--================Product Description Area =================-->
	
	<!--================End Product Description Area =================-->

	<!--================ Subscription Area ================-->
	
	<!--================ End Subscription Area ================-->

@endsection