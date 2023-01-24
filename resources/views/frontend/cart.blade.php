@extends('layouts.frontend')

@section('home_content')

	<section class="banner_area">
		<div class="banner_inner d-flex align-items-center">
			<div class="container">
				<div class="banner_content text-center">
					<h2>Shopping Cart</h2>
					<div class="page_link">
						<a href="{{ route('index') }}">Home</a>
						<a href="#">Cart</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	
		<!--================Cart Area =================-->
	<section class="cart_area">
		@include('includes.message')
		<div class="container">
			<div class="cart_inner">
				<div class="table-responsive">
					<table class="table">
						<thead>
							<tr>
								<th scope="col">Product</th>
								<th scope="col">Price</th>
								<th scope="col">Quantity</th>
								<th scope="col">Total</th>
							</tr>
						</thead>
						<tbody>
							@foreach($carts as $row)
							<tr>
								<td>
									<div class="media">
										<div class="d-flex">
											<img src="{{ asset($row->product->product_image) }}" alt="" style="height: 50px; width: 100px;">
										</div>
										<div class="media-body">
											<p>{{ $row->product->product_name }}</p>
										</div>
									</div>
								</td>
								<td>
									<h5>৳{{ $row->product_price }}</h5>
								</td>
								<td>
									<div class="product-quantity">
									  	<form action="{{ url('cart-quantity-update', $row->id) }}" method="POST">
									  	@csrf
										        <input name="product_quantity" type="number" value="{{ $row->product_quantity }}" min="1">
										    
										    	<button class="btn btn-sm btn-success" type="submit">Update</button>
								    	</form>
								    </div>
								</td>
								<td>
									<h5>৳{{ $row->product_price * $row->product_quantity }}</h5>
								</td>
								<td>
									<button type="button" class="close" aria-label="Close">
									 <a href="{{ route('cart-destroy', $row->id) }}"> <span aria-hidden="true"> <span aria-hidden="true"></span>&times;</a>
									</button>
								</td>
							</tr>
							@endforeach
							
							
							
							
							<tr>
								<td>

								</td>
								<td>
										<p><strong>* Shipping price will be added</strong></p>
								</td>
								<td>
									<h5>Subtotal</h5>
								</td>
								<td>
									<h5>৳{{ $subtotal }}</h5>
								</td>
								
							</tr>
							
							
							<tr class="out_button_area">
								<td>

								</td>
								<td>

								</td>
								<td>

								</td>
								<td>
									<div class="checkout_btn_inner">
										<a class="gray_btn" href="{{ route('index') }}">Continue Shopping</a>
										
										<a class="main_btn" href="{{ route('checkout', $row->user_ip) }}">Proceed to checkout</a>
										
									</div>

								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</section>
	<!--================End Cart Area =================-->

	<!--================ Subscription Area ================-->
	
	<!--================ End Subscription Area ================-->

@endsection