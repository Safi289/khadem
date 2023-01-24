@extends('layouts.backend')

@section('home_content')






	<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Company</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                            <li class="breadcrumb-item active">Company</li>
                            
                        </ol>
                        
                

                            <form method="POST" action="{{ route('update-company') }}" enctype="multipart/form-data">

                                   @csrf

                                  @include('includes.message')

                                

                                  <div class="form-group">

                                    
                                     <input type="hidden" name="id" value="{{ $row['id'] }}">
                                    <label for="company_name">Company Name *</label>
                                    <input type="text" name="company_name" class="form-control col-sm-4" id="company_name" value="{{ $row['company_name'] }}" placeholder="Enter Company Name" required="">


                                    
                                    <br>
                                    <label for="company_description">Company Description</label>
                                    <input type="text" name="company_description" class="form-control col-sm-4" id="company_description" value="{{ $row['company_description'] }}" placeholder="Enter Company Description" required="">


                                    
                                    <br>
                                    <label for="company_phone">Phone</label>
                                    <input type="text" name="company_phone" class="form-control col-sm-4" id="company_phone" value="{{ $row['company_phone'] }}" placeholder="Enter Phone" required="">


                                    
                                    <br>
                                    <label for="company_email">Email</label>
                                    <input type="text" name="company_email" class="form-control col-sm-4" id="company_email" value="{{ $row['company_email'] }}" placeholder="Enter Email" required="">


                                    
                                    <br>
                                    <label for="company_address">Address</label>
                                    <input type="text" name="company_address" class="form-control col-sm-4" id="company_address" value="{{ $row['company_address'] }}" placeholder="Enter Address" required="">


                                    <br>


                                    <label for="exampleFormControlFile1">Company Logo *</label>
                                     <input type="hidden" value="{{ $row->company_logo }}" name="company_logo_old">
                                    <input type="file" name="company_logo" class="form-control-file" id="exampleFormControlFile1">
                                    <img src="{{ asset($row->company_logo) }}" style="height: 50px; width: 100px;">

                                    <br>

                                    
     
                                  </div>
   
                                  <button type="submit" class="btn btn-primary">Submit</button>
                            </form>

                        
                       
                        
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