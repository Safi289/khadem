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
                        
                

                            <form method="POST" action="{{ route('save-company') }}" enctype="multipart/form-data">

                                   @csrf

                                  @include('includes.message')

                                

                                  <div class="form-group">

                                    
                                    <label for="company_name">Company Name *</label>
                                    <input type="text" name="company_name" class="form-control col-sm-4" id="company_name" value="{{ old('company_name') }}" placeholder="Enter Company Name" required="">


                                    
                                    <br>
                                    <label for="company_description">Company Description</label>
                                    <input type="text" name="company_description" class="form-control col-sm-4" id="company_description" value="{{ old('company_description') }}" placeholder="Enter Company Description" required="">


                                    
                                    <br>
                                    <label for="company_phone">Phone</label>
                                    <input type="text" name="company_phone" class="form-control col-sm-4" id="company_phone" value="{{ old('company_phone') }}" placeholder="Enter Phone" required="">


                                    
                                    <br>
                                    <label for="company_email">Email</label>
                                    <input type="text" name="company_email" class="form-control col-sm-4" id="company_email" value="{{ old('company_email') }}" placeholder="Enter Email" required="">


                                    
                                    <br>
                                    <label for="company_address">Address</label>
                                    <input type="text" name="company_address" class="form-control col-sm-4" id="company_address" value="{{ old('company_address') }}" placeholder="Enter Address" required="">


                                    <br>


                                    <label for="exampleFormControlFile1">Company Logo *</label>
                                    <input type="file" name="company_logo" class="form-control-file" id="exampleFormControlFile1" required>

                                    <br>

                                    
     
                                  </div>
   
                                  <button type="submit" class="btn btn-primary">Submit</button>
                            </form>

                        
                       
                        
                    </div><br><br>

                     <table class="table table-bordered" id="table_id">
                                  <thead>
                                    <tr>
                                      <th scope="col">#</th>
                                      <th scope="col">Company</th>
                                      <th scope="col">Description</th>
                                      <th scope="col">Image</th>
                                      <th scope="col">Phone</th>
                                      <th scope="col">Email</th>
                                      <th scope="col">Address</th>
                                      <th scope="col">Action</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    @php($i = 1)
                                    
                                    
                                    <tr>
                                      <th scope="row">{{ $i }}</th>
                                      <td>{{ $row->company_name }}</td>
                                      <td>{{ $row->company_description }}</td>
                                      <td><img src="{{ asset($row->company_logo) }}" style="height: 50px; width: 100px;"></td>
                                      <td>{{ $row->company_phone }}</td>
                                      <td>{{ $row->company_email }}</td>
                                      <td>{{ $row->company_address }}</td>

                                      
                                      <td>
                                        

                                        <a class="btn btn-primary" href="{{ route('edit-company', $row->id) }}" role="button">Edit</a>
                                        <a class="btn btn-danger" href="{{ route('delete-company', $row->id) }}" role="button">Delete</a>
                                      </td>
                                    </tr>
                                    @php($i++)
                                   
                                   
                                   
                                   
                                  </tbody>
                            </table>


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