@extends('layouts.backend')

@section('home_content')

<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Admin Profile</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                            <li class="breadcrumb-item active">Admin Profile</li>
                            
                        </ol>
                        
                

                            <form method="POST" action="{{ route('update-admin') }}">

                                   @csrf

                                  @include('includes.message')
                                  

                                  <input type="hidden" name="id" value="{{ $id }}">
                                  <div class="form-group">

                                    
                                    <label for="category_name">Name</label>
                                    <input type="text" name="name" class="form-control col-sm-4" id="name" aria-describedby="emailHelp" value="{{ $admin->name }}" placeholder="Enter Name">
                                   
                                  </div>

                                   <div class="form-group">

                                    
                                    <label for="category_name">Email</label>
                                    <input type="text" name="email" class="form-control col-sm-4" id="email" aria-describedby="emailHelp" value="{{ $admin->email }}" placeholder="Enter Email">
                                   
                                  </div>

                                   <div class="form-group">

                                    
                                    <label for="category_name">Password</label>
                                    <input type="text" name="password" class="form-control col-sm-4" id="password" aria-describedby="emailHelp" value="{{ $admin->normal }}" placeholder="Enter Password">
                                   
                                  </div>

                                 

                                  
                                  
                                  <button type="submit" class="btn btn-primary">Update</button>
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