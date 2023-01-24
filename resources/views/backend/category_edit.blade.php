@extends('layouts.backend')

@section('home_content')








	<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Add Category</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                            <li class="breadcrumb-item active">Category</li>
                            <li class="breadcrumb-item active">Update Category</li>
                        </ol>
                        
                

                            <form method="POST" action="{{ route('update-category') }}">

                                   @csrf

                                  @include('includes.message')

                                  <a class="btn btn-primary" href="{{ route('manage-category') }}" role="button">Manage Category</a><br><br>

                                  <div class="form-group">

                                    
                                    <label for="category_name">Update Categoty</label>
                                    <input type="hidden" name="id" value="{{ $row['id'] }}">
                                    <input type="text" name="category_name" class="form-control col-sm-4" id="category_name" aria-describedby="emailHelp" value="{{ $row['category_name'] }}" placeholder="Enter Categoty Name">
                                   
                                  </div>

                                   <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Category Description</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="category_description">{{ $row['category_description'] }}</textarea>
                                  </div>

                                  
                                  
                                  <button type="submit" class="btn btn-primary">Update</button>
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



