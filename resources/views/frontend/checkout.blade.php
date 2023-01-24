@extends('layouts.frontend')

@section('home_content')

	<!--================Home Banner Area =================-->
	<section class="banner_area">
		<div class="banner_inner d-flex align-items-center">
			<div class="overlay"></div>
			<div class="container">
				<div class="banner_content text-center">
					<h2>Product Checkout</h2>
					<div class="page_link">
						<a href="#">Home</a>
						<a href="#">Cart</a>
						<a href="#">Checkout</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Home Banner Area =================-->

	<!--================Checkout Area =================-->
	<section class="checkout_area section_gap">
		<div class="container">
			@include('includes.message')
			<!-- <div class="returning_customer">
				<div class="check_title">
					<h2>Returning Customer?
						<a href="#">Click here to login</a>
					</h2>
				</div>
				<p>If you have shopped with us before, please enter your details in the boxes below. If you are a new customer, please proceed
					to the Billing & Shipping section.</p>
				<form class="row contact_form" action="#" method="post" novalidate="novalidate">
					<div class="col-md-6 form-group p_star">
						<input type="text" class="form-control" id="name" name="customer_name" value=" ">
						<span class="placeholder" data-placeholder="Full Name"></span>
					</div>
					<div class="col-md-6 form-group p_star">
						<input type="password" class="form-control" id="password" name="password" value="">
						<span class="placeholder" data-placeholder="Password"></span>
					</div>
					<div class="col-md-12 form-group">
						<button type="submit" value="submit" class="btn submit_btn">Send Message</button>
						<div class="creat_account">
							<input type="checkbox" id="f-option" name="selector">
							<label for="f-option">Remember me</label>
						</div>
						<a class="lost_pass" href="#">Lost your password?</a>
					</div>
				</form>
			</div> -->
			<!-- <div class="cupon_area">
				<div class="check_title">
					<h2>Have a coupon?
						<a href="#">Click here to enter your code</a>
					</h2>
				</div>
				<input type="text" placeholder="Enter coupon code">
				<a class="tp_btn" href="#">Apply Coupon</a>
			</div> -->
			<div class="billing_details">
				<div class="row">

					<div class="col-lg-8">
						<h3>Billing & Shipping Details</h3>
						<form class="row contact_form" action="{{ route('place-order') }}" method="post" novalidate="novalidate">
							@csrf
							<input type="hidden" name="user_ip" value="{{ request()->ip() }}">
							
							
							<input type="hidden" name="total_price" value="{{ $subtotal + $shipping_price->shipping_price }}">
							
							@if(!Auth::guard('customer')->user())
							<div class="col-md-6 form-group p_star">
								<label>Name *</label>
								<input type="text" class="form-control" id="first" name="customer_name" required>
								
							</div>
							@endif
							@if(Auth::guard('customer')->user())
								<div class="col-md-6 form-group p_star">
								<label>Name *</label>
								<input type="text" class="form-control" id="first" name="customer_name" required value="{{ Auth::guard('customer')->user()->name }}">
								
							</div>
							@endif
							
							@if(!Auth::guard('customer')->user())
							<div class="col-md-6 form-group p_star">
								<label>Phone Number *</label>
								<input type="text" class="form-control" id="phone_number" name="phone_number" required>
								
							</div>
							@endif

							@if(Auth::guard('customer')->user())
							<div class="col-md-6 form-group p_star">
								<label>Phone Number *</label>
								<input type="text" class="form-control" id="phone_number" name="phone_number" required value="{{ Auth::guard('customer')->user()->phone }}">
								
							</div>
							@endif
							
							@if(!Auth::guard('customer')->user())
							<div class="col-md-12 form-group p_star">
								<label>Shipping Address *</label>
								<input type="text" class="form-control" id="add1" name="address">
								
							</div>
							@endif

							@if(Auth::guard('customer')->user())
							<div class="col-md-12 form-group p_star">
								<label>Shipping Address *</label>
								<input type="text" class="form-control" id="add1" name="address" value="{{ Auth::guard('customer')->user()->address }}">
								
							</div>
							@endif
							
							@if(!Auth::guard('customer')->user())
							<div class="col-md-12 form-group p_star">
								<label>City *</label>
								<input type="text" class="form-control" id="city" name="city" required>
								
							</div>
							@endif

							@if(Auth::guard('customer')->user())
							<div class="col-md-12 form-group p_star">
								<label>City *</label>
								<input type="text" class="form-control" id="city" name="city" required value="{{ Auth::guard('customer')->user()->city }}">
								
							</div>
							@endif

							<div class="col-md-12 form-group p_star">
								<label>Courier Service (If Required)</label>
								<input type="text" class="form-control" id="courier" name="courier">
								
							</div>

							
							
							<div class="col-md-12 form-group">
								<label>Payment Method *</label>
								@foreach($payment as $row)
								<div class="form-check">
								  <input class="form-check-input" type="radio" name="payment" id="payment" value="{{ $row->method_name }}" required>
								  <label class="form-check-label" for="payment">
								    {{ $row->method_name }}<br>
								    ({{ $row->method_description }})
								  </label>
								</div>
								@endforeach
							</div>
							
							
						
							<div class="col-md-12 form-group">
								
								<textarea class="form-control" name="notes" id="message" rows="1" placeholder="Special Notes & Last 4 digit of money sender Number" required=""></textarea>
							</div>
							
						
					</div>
					<div class="col-lg-4">
						<div class="order_box">
							<h2>Your Order</h2>
							<table class="table">
						<thead>
							<tr>
								<th scope="col">Product</th>
								<th scope="col">Rate</th>
								<th scope="col">Quantity</th>
								<th scope="col">Total</th>
							</tr>
						</thead>
						<tbody>


							@foreach($order as $row)
							<input type="hidden" name="cart_ip" value="{{ $row->user_ip }}">
							<tr>
								<td>
									<p>{{ $row->product->product_name }}</p>
								</td>
								<td>
									<p>{{ $row->product_price }}</p>
								</td>
								<td>
									<h5>x {{ $row->product_quantity }}</h5>
								</td>
								<td>
									<p>৳{{ $row->product_price * $row->product_quantity }}</p>
								</td>
							</tr>
							<br>
							
							@endforeach
							
							
						
							<tr>
								<td>
									<h4>SubTotal</h4>
								</td>
								<td>
									<h5></h5>
								</td>
								<td>
									<h5></h5>
								</td>
								<td>
									<p>৳{{ $subtotal }}</p>
								</td>
							</tr>
							<tr>
								<td>
									<h4>Total</h4>
								</td>
								<td>
									<h5></h5>
								</td>
								<td>
									<h5></h5>
								</td>
								<td>
									<p>৳{{ $subtotal }}</p>
								</td>
							</tr>
						</tbody>
					</table>
							<ul class="list list_2">
								

								
								<strong>*Shipping Cost Will be Added</strong>
							</ul>
							
							<button type="submit" class="main_btn">Place Order</button>
						</div>
					</div>

				</form>
				</div>
			</div>
		</div>
	</section>
	<!--================End Checkout Area =================-->

	<!--================ Subscription Area ================-->
	
	<!--================ End Subscription Area ================-->

@endsection