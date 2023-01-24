@extends('layouts.frontend')

@section('home_content')

	
		<!--================Home Banner Area =================-->
	<section class="banner_area">
		<div class="banner_inner d-flex align-items-center">
			<div class="container">
				<div class="banner_content text-center">
					<h2>Shop</h2>
					<div class="page_link">
						<a href="#">Home</a>
						<a href="#">Shop</a>
						
						
						
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Home Banner Area =================-->

	<!--================Category Product Area =================-->
	<section class="cat_product_area section_gap">
		<div class="container-fluid">
			<div class="row flex-row-reverse">
				<div class="col-lg-9">
					<div class="product_top_bar">
						<!-- <div class="left_dorp">
							<select class="sorting">
								<option value="1">Default sorting</option>
								<option value="2">Default sorting 01</option>
								<option value="4">Default sorting 02</option>
							</select>
							<select class="show">
								<option value="1">Show 12</option>
								<option value="2">Show 14</option>
								<option value="4">Show 16</option>
							</select>
						</div> -->
						<!-- <div class="right_page ml-auto">
							<nav class="cat_page" aria-label="Page navigation example">
								<ul class="pagination">
									<li class="page-item">
										<a class="page-link" href="#">
											<i class="fa fa-long-arrow-left" aria-hidden="true"></i>
										</a>
									</li>
									<li class="page-item active">
										<a class="page-link" href="#">1</a>
									</li>
									<li class="page-item">
										<a class="page-link" href="#">2</a>
									</li>
									<li class="page-item">
										<a class="page-link" href="#">3</a>
									</li>
									<li class="page-item blank">
										<a class="page-link" href="#">...</a>
									</li>
									<li class="page-item">
										<a class="page-link" href="#">6</a>
									</li>
									<li class="page-item">
										<a class="page-link" href="#">
											<i class="fa fa-long-arrow-right" aria-hidden="true"></i>
										</a>
									</li>
								</ul>
							</nav>
						</div> -->
					</div>
					<div class="latest_product_inner row">
						
						
						@foreach($product as $row)
						<div class="col-lg-3 col-md-3 col-sm-6">
							<div class="f_p_item">
								<div class="f_p_img">
									<a href="{{ route('detail', $row->id) }}">
									<img class="img-fluid" src="{{ asset($row->product_image) }}" alt="" style="height: 200px; width: 200px;">
									</a>
									<div class="p_icon">
										<!-- <a href="#">
											<i class="lnr lnr-heart"></i>
										</a> -->
									@if($row->status)
									<form action="{{ route('add-to-cart', $row->id) }}" method="post">
									@csrf

									<input type="hidden" id="quantity" name="quantity" value="1">
									
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
						@endforeach
						
						
					
					
						
					
					</div>
				</div>
				<div class="col-lg-3">
					<div class="left_sidebar_area">
						<aside class="left_widgets cat_widgets">
							<div class="l_w_title">
								<h3>Browse Categories</h3>
							</div>
							<div class="widgets_inner">
								<ul class="list">
									@foreach($category as $row)
									@if($row->status == 1)
									<li>
										<a href="{{ route('products', $row->id) }}">{{ $row->category_name }}</a>
									</li>
									@endif
									@endforeach
							
								<!-- 	<li>
										<a href="#">Beverages</a>
										<ul class="list">
											<li>
												<a href="#">Frozen Fish</a>
											</li>
											<li>
												<a href="#">Dried Fish</a>
											</li>
											<li>
												<a href="#">Fresh Fish</a>
											</li>
											<li>
												<a href="#">Meat Alternatives</a>
											</li>
											<li>
												<a href="#">Meat</a>
											</li>
										</ul>
									</li> -->

									
								</ul>
							</div>
						</aside>
						<aside class="left_widgets p_filter_widgets">
							<div class="l_w_title">
								<h3>Product Filters</h3>
							</div>
							
						<form action="{{ route('shop-filter') }}" method="POST">
							@csrf
							
							<div class="widgets_inner">
								<h4>Price</h4>
								<div class="">
									<div id="slider-range"></div>
									<div class="row m0">
										<label for="amount">Price range:</label>
										<br>
										 <input type="number" id="amount_start" name="start_price" value="50">
										 <input type="number" id="amount_end" name="end_price" value="5000">
										 <br><hr>
										 
									</div>
									<br>
									<button type="submit" class="btn btn-primary" >Search</button>
								</div>
							</div>
							</form>



						</aside>
						
					</div>
				</div>
			</div>

			<div class="row">
				<nav class="cat_page mx-auto" aria-label="Page navigation example">
					{{ $product->links() }}
				</nav>
			</div>
		</div>
	</section>
	<!--================End Category Product Area =================-->

	<!--================ Subscription Area ================-->
	
	<!--================ End Subscription Area ================-->

@endsection