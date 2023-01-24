@extends('layouts.backend')

@section('home_content')


	<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Order</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                            <li class="breadcrumb-item active">Order</li>
                        </ol>
                        @include('includes.message')

                        <form action="{{ route('product-search') }}" method="POST">
                          @csrf
                          <div class="form-group">

                                    
                                   <!--  <label for="category">Product</label> -->
                                    <input type="hidden" name="product_id">
                                    <select class="form-control col-sm-4" id="category" name="product_id" required>
                                        <option value="">Select Product</option>
                                       @foreach($product as $row)
                                        <option value="{{ $row->id }}">{{ $row->product_name }}</option>
                                       @endforeach

                                    </select>

                                    <br>

                                     <input type="date" name="start_time" required="">T0<input type="date" name="end_time" required="">
                                    <br><br>
                                    
                                   <button type="submit" class="btn btn-primary">Search</button>
                                  </div>
                          
                          
                        </form>
                        <br>

                     
                        
                        <table class="table table-bordered" id="table_id">
                                  <thead>
                                    <tr>
                                      <th scope="col">#</th>
                                      <th scope="col">Order No.</th>
                                      <th scope="col">Customer Name</th>
                                      <th scope="col">Order City</th>
                                      <th scope="col">Customer Number</th>
                                      <th scope="col">Order Date</th>
                                      <!-- <th scope="col">Total Price</th> -->
                                      <th scope="col">Action</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                  
                                    @php($i = 1)
                                    @foreach($orders as $row)
                                    <tr>
                                      <th scope="row">{{ $i }}</th>
                                      <td>{{ $row->id }}</td>
                                      <td>{{ $row->customer_name }}</td>
                                      <td>{{ $row->city }}</td>
                                      <td>{{ $row->phone_number }}</td>
                                      <td>{{ date('d-m-Y', strtotime($row->created_at)) }}</td>
                                      <!-- <td>৳{{ $row->total_price }}</td> -->

                                      
                                      <td>
                                        
                                        

                                        <a class="btn btn-primary" href="{{ route('order-detail', $row->id) }}" role="button">Detail</a>
                                        <a class="btn btn-danger" href="{{ route('order-delete', $row->id) }}" role="button">Delete</a>
                                         <a class="btn btn-success" href="{{ route('add-shipping', $row->id) }}" role="button">Shipping</a>
                                         
                                      </td>
                                    </tr>
                                    @php($i++)
                                    @endforeach
                                   
                                   
                                    
                                   
                                   
                                  </tbody>
                            </table>
                        
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



