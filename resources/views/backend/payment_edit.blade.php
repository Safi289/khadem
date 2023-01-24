@extends('layouts.backend')

@section('home_content')

	<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Payment Methods</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                            <li class="breadcrumb-item active">Add Payment Methods</li>
                            
                        </ol>
                        
                

                            <form method="POST" action="{{ route('update-payment') }}">

                                   @csrf

                                  @include('includes.message')

                                  <div class="form-group">
                                     <input type="hidden" name="id" value="{{ $row['id'] }}">
                                   
                                    <label for="method_name">Method Name</label>
                                    <input type="text" name="method_name" class="form-control col-sm-4" id="method_name" aria-describedby="emailHelp" value="{{ $row['method_name'] }}" placeholder="Enter Method Name">
                                   
                                  </div>
                                   <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Method Description</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="method_description">{{ $row['method_description'] }}</textarea>
                                  </div>



                                  
                                  
                                  <button type="submit" class="btn btn-primary">Submit</button>
                            </form><br><br>

                            

                        
                       
                        
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