
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

<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container">
    <div class="row">
        <div class="col-xs-12">
    		<div class="invoice-title">
                <h2>{{$company->company_name}}</h2>
                <br>
    			<h2>Invoice</h2><br>
                <h3 class="pull-right">Order # {{ $checkout->id }}</h3>
    		</div>
    		<hr>
    		<div class="row">
    			<div class="col-xs-6">
    				<address>
    				<strong>Shipped & Billed To:</strong><br>
    					<strong>Name:</strong>  {{ $checkout->customer_name }}<br>
                                            
                        <strong>Address:</strong> {{ $checkout->address }}<br>
                        <strong>City:</strong> {{ $checkout->city }}<br>
                        <strong>Phone:</strong> {{ $checkout->phone_number }}
    				</address>
    			</div>
    			<!-- <div class="col-xs-6 text-right">
    				<address>
        			<strong>Shipped To:</strong><br>
    					Jane Smith<br>
    					1234 Main<br>
    					Apt. 4B<br>
    					Springfield, ST 54321
    				</address>
    			</div> -->
    		</div>
    		<div class="row">
    			<!-- <div class="col-xs-6">
    				<address>
    					<strong>Payment Method:</strong><br>
    					Visa ending **** 4242<br>
    					jsmith@email.com
    				</address>
    			</div> -->
    			<div class="col-xs-6 text-right">
    				<address>
    					<strong>Order Date:</strong><br>
    					{{ date('d-m-Y', strtotime($checkout->created_at)) }}<br><br><br>
    				</address>
    			</div>
                <div class="col-xs-6 text-right">
                    @if($checkout->courier)
                    <address>
                        <strong>Courier Service:</strong><br>
                        {{ $checkout->courier }}<br><br><br>
                    </address>
                    @endif
                     <address>
                        <strong>Payment:</strong><br>
                        {{ $checkout->payment }}<br><br><br>
                    </address>
                </div>
    		</div>
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
    								<td class="text-center">Tk.{{ $row->product_price }}</td>
    								<td class="text-center">{{ $row->product_quantity }}</td>
    								<td class="text-right">Tk.{{ $row->product_price * $row->product_quantity }}</td>
    							</tr>
                                @endforeach
                              
                            
    							<tr>
    								<td class="thick-line"></td>
    								<td class="thick-line"></td>
    								<td class="thick-line text-center"><strong>Subtotal</strong></td>
    								<td class="thick-line text-right">Tk.{{ $subtotal }}</td>
    							</tr>

                                @if($row->shipping_price)
                                <tr>
                                    <td class="thick-line"></td>
                                    <td class="thick-line"></td>
                                    <td class="thick-line text-center"><strong>Shipping Cost</strong></td>
                                    <td class="thick-line text-right">Tk.{{ $row->shipping_price }}</td>
                                </tr>
    							
    							<tr>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
    								<td class="no-line text-center"><strong>Total</strong></td>
    								<td class="no-line text-right">Tk.{{ $subtotal + $row->shipping_price }}</td>
    							</tr>
                                @endif
                                @if(!$row->shipping_price)
                                <tr>
                                    <td class="no-line"></td>
                                    <td class="no-line"></td>
                                    <td class="no-line text-center"><strong>Total</strong></td>
                                    <td class="no-line text-right">Tk.{{ $subtotal }}</td>
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
<div class="row footer-bottom d-flex justify-content-between align-items-center">
                <p class="col-lg-12 footer-text text-center"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    <small>Software By Dream Technologies</small>

<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                </p>
            </div>