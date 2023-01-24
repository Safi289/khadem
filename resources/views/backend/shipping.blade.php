@extends('layouts.backend')

@section('home_content')

	<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Shipping</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                            <li class="breadcrumb-item active">Add Shipping</li>
                            
                        </ol>
                        
                

                            <form method="POST" action="{{ route('shipping-price') }}">

                                   @csrf

                                  @include('includes.message')

                                  <div class="form-group">

                                    <input type="hidden" name="id" value="{{ $id }}">
                                    <label for="shipping_price">Add Shipping Price</label>
                                    <input type="text" name="shipping_price" class="form-control col-sm-4" id="shipping_price" aria-describedby="emailHelp" value="" placeholder="Enter Shipping Price">
                                   
                                  </div>



                                  
                                  
                                  <button type="submit" class="btn btn-primary">Submit</button>
                            </form>

                        
                       
                        
                    </div>


                </main>

                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Dream Technologies</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>












@endsection