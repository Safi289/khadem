@extends('layouts.frontend')

@section('home_content')
	
	<!--================Home Banner Area =================-->
	<section class="banner_area">
		<div class="banner_inner d-flex align-items-center">
			<div class="container">
				<div class="banner_content text-center">
					<h2>Order Confirmation</h2>
					<div class="page_link">
						<!-- <a href="index.html">Home</a> -->
						<a href="confirmation.html">Confirmation</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Home Banner Area =================-->

	<!--================Order Details Area =================-->
	<section class="order_details p_120">
		<div class="container">
			<h3 class="title_confirmation">Thank you. Your order has been received.</h3>

			<div class="row order_d_inner">
				<div class="col-lg-4">
					<div class="details_item">
						<h4>Order Info</h4>
						<p><strong>*Please Remember The Order Number to Track</strong></p>
						<ul class="list">
							<li>
								<a href="#">
									<span>Order number</span> : {{ $checkout->id }}</a>
							</li>
							<li>
								<a href="#">
									<span>Date</span> : {{ date('d-m-Y', strtotime($checkout->created_at)) }}</a>
							</li>
							<li>
								<a href="#">
									<span>Total</span> :৳ {{ $subtotal }}</a>
							</li>
							<li>
								<a href="#">
									<span>Payment</span> :{{ $checkout->payment }}</a>
							</li>
							<!-- <li>
								<a href="#">
									<span>Payment method</span> : Check payments</a>
							</li> -->
						</ul>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="details_item">
						<h4>Billing & Shipping Address</h4>
						<ul class="list">
							<li>
								<a href="#">
									<span>Customer</span>: {{ $checkout->customer_name }}</a>
							</li>
							<li>
								<a href="#">
									<span>City</span> : {{ $checkout->city }}</a>
							</li>
							<li>
								<a href="#">
									<span>Address</span> : {{ $checkout->address }}</a>
							</li>
							<li>
								<a href="#">
									<span>Phone </span>: {{ $checkout->phone_number }}</a>
							</li>
							<li>
								<a href="#">
									<span>Courier Service </span>: {{ $checkout->courier }}</a>
							</li>
						</ul>
					</div>
				</div>
				
			</div>
			<div class="order_details_table">
				<h2>Order Details</h2>
				<p>Download the Memo By clicking The Button Below</p>
				<p><strong>*Shipping Cost will be Added</strong></p>
				<a href="{{ route('export-pdf-customer', $checkout->id) }}" class="btn btn-success">Memo</a>
				<div class="table-responsive">
					<table class="table">
						<thead>
							<tr>
								<th scope="col">Product</th>
								<th scope="col">Quantity</th>
								<th scope="col">Total</th>
							</tr>
						</thead>
						<tbody>

							@foreach($checkout_cart as $row)
							<tr>
								<td>
									<p>{{ $row->product_name }}</p>
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
									<h4>Total</h4>
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
				</div>
			</div>
		</div>
	</section>
	<!--================End Order Details Area =================-->

	<!--================ Subscription Area ================-->
	
	<!--================ End Subscription Area ================-->

@endsection