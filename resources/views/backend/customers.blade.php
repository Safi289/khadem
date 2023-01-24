@extends('layouts.backend')

@section('home_content')









	<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Customers</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                            <li class="breadcrumb-item active">Customer List</li>
                        </ol>
                        @include('includes.message')

                        <form action="{{ route('product-customer') }}" method="POST">
                          @csrf
                          <div class="form-group">

                                    
                                   <!--  <label for="category">Product</label> -->
                                    <input type="hidden" name="product_id">
                                    <select class="form-control col-sm-4" id="category" name="product_id">
                                        <option value="">Select Product</option>
                                       @foreach($product as $row)
                                        <option value="{{ $row->id }}">{{ $row->product_name }}</option>
                                       @endforeach

                                    </select>

                                    <br>

                                
                                    
                                   <button type="submit" class="btn btn-primary">Search</button>
                                  </div>
                          
                          
                        </form>
                        <br>

                     
                        
                        <table class="table table-bordered" id="table_id">
                                  <thead>
                                    <tr>
                                      <th scope="col">#</th>
                                      <th scope="col">Order ID</th>
                                      <th scope="col">Customer Name</th>
                                      <th scope="col">City</th>
                                      <th scope="col">Customer Number</th>
                                      <!-- <th scope="col">Orded Products</th> -->
                                     
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