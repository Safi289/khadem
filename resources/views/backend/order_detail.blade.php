<style type="text/css">
.invoice-title h2, .invoice-title h3 {
    display: inline-block;
}

.table > tbody > tr > .no-line {
    border-top: none;
}

.table > thead > tr > .no-line {
    border-bottom: none;
}

.table > tbody > tr > .thick-line {
    border-top: 2px solid;
}
</style>






@extends('layouts.backend')

@section('home_content')





          







<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Order Detail</h1>

                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                            <li class="breadcrumb-item active">Order Detail</li>
                        </ol>




                       <div>
                       	<a href="{{ route('export-pdf', $checkout->id) }}" class="btn btn-success">PDF</a>
                       	<a href="{{ route('export-excel', $checkout->id) }}" class="btn btn-success">Excel</a>
                       	 <a class="btn btn-primary" href="{{ route('add-shipping', $checkout->id) }}" role="button">Shipping</a>
                        

                       

                       

                    

                       	
                       	

                       <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
						<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
						<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

					<div class="container">
					    <div class="row">
					        <div class="col-xs-12">
					    		<div class="invoice-title">
					    			<h2>Invoice</h2><br>
					    			<h3 class="">Order # {{ $checkout->id }}</h3>
					    		</div>
					    		<hr>
					    		<div class="row">
					    			<div class="col-xs-6">
					    				<address>
					    				<strong>Shipped & Billed To:</strong><br>
					    					<strong>Name:</strong>  {{ $checkout->customer_name }}<br>
					    					
					    					<strong> Address:</strong> {{ $checkout->address }}<br>
					    					<strong>City:</strong> {{ $checkout->city }}<br>
					    					<strong>Phone:</strong> {{ $checkout->phone_number }}
					    					<br>
					    					<strong>payment:</strong> {{ $checkout->payment }}
					    				</address>
					    			</div>
					    			
					    		</div>
					    		<div class="row">
					    			
					    			<div class="col-xs-6 text-right">
					    				<address>
					    					<strong>Order Date:</strong><br>
					    					{{ date('d-m-Y', strtotime($checkout->created_at)) }}<br><br><br>
					    				</address>
					    			</div>
					    		</div>
                                @if($checkout->notes)
                                <div  class="row">
                                    <strong>Special Notes:</strong>
                                    {{ $checkout->notes }}
                                </div><br>
                                @endif
                                 @if($checkout->courier)
                                <div  class="row">
                                    <strong>Courier Service:</strong>
                                    {{ $checkout->courier }}
                                </div><br>
                                @endif
					    	</div>
					    </div>
					    
					    <div class="row">
					    	<div class="col-md-12">
					    		<div class="panel panel-default">
					    			<div class="panel-heading">
					    				<h3 class="panel-title"><strong>Order summary</strong></h3>
					    			</div>
					    			<div class="panel-body">
					    				<div class="table-responsive">
					    					<table class="table table-condensed">
					    						<thead>
					                                <tr>
					        							<td><strong>Item</strong></td>
					        							<td class="text-center"><strong>Price</strong></td>
					        							<td class="text-center"><strong>Quantity</strong></td>
					        							<td class="text-right"><strong>Totals</strong></td>
					                                </tr>
					    						</thead>
					    						<tbody>
					    							<!-- foreach ($order->lineItems as $line) or some such thing here -->
					                                @foreach($checkout_cart as $row)
					    							<tr>
					    								<td>{{ $row->product_name }}</td>
					    								<td class="text-center">৳{{ $row->product_price }}</td>
					    								<td class="text-center">{{ $row->product_quantity }}</td>
					    								<td class="text-right">৳{{ $row->product_price * $row->product_quantity }}</td>
					    							</tr>
					                                @endforeach
					                              
					                            
					    							<tr>
					    								<td class="thick-line"></td>
					    								<td class="thick-line"></td>
					    								<td class="thick-line text-center"><strong>Subtotal</strong></td>
					    								<td class="thick-line text-right">৳{{ $subtotal }}</td>
					    							</tr>

                                                    @if($checkout->shipping_price)
                                                    <tr>
                                                        <td class="thick-line"></td>
                                                        <td class="thick-line"></td>
                                                        <td class="thick-line text-center"><strong>Shipping Cost</strong></td>
                                                        <td class="thick-line text-right">৳{{ $row->shipping_price }}</td>
                                                    </tr>
					    							@endif

                                                     @if($checkout->shipping_price)
					    							<tr>
					    								<td class="no-line"></td>
					    								<td class="no-line"></td>
					    								<td class="no-line text-center"><strong>Total</strong></td>
					    								<td class="no-line text-right">৳{{ $subtotal + $row->shipping_price }}</td>
					    							</tr>
                                                    @endif
                                                    @if(!$checkout->shipping_price)
                                                    <tr>
                                                        <td class="no-line"></td>
                                                        <td class="no-line"></td>
                                                        <td class="no-line text-center"><strong>Total</strong></td>
                                                        <td class="no-line text-right">৳{{ $subtotal }}</td>
                                                    </tr>
                                                    @endif
					    						</tbody>
					    					</table>
					    				</div>
					    			</div>
					    		</div>
					    	</div>
					    </div>
					</div>




                       </div>

                        </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Dream Technologies</div>
                           
                        </div>
                    </div>
                </footer>
            </div>








@endsection