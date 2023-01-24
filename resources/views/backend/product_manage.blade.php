@extends('layouts.backend')

@section('home_content')




            





	<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Manage Product</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                            <li class="breadcrumb-item active">Product</li>
                            <li class="breadcrumb-item active">Manage Product</li>
                        </ol>
                         @include('includes.message')

                         <a class="btn btn-success" href="{{ route('add-product') }}" role="button">Add Product</a><br><br>
                        
                            <table class="table table-bordered" id="table_id">
                                  <thead>
                                    <tr>
                                      <th scope="col">#</th>
                                      <th scope="col">Category</th>
                                      <th scope="col">Product</th>
                                      <th scope="col">Image</th>
                                      <th scope="col">Price</th>
                                      <th scope="col">Status</th>
                                      <th scope="col">Action</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    @php($i = 1)
                                    @foreach($product as $row)
                                    
                                    <tr>
                                      <th scope="row">{{ $i }}</th>
                                      <td>{{ $row->category_name }}</td>
                                      <td>{{ $row->product_name }}</td>
                                      <td><img src="{{ asset($row->product_image) }}" style="height: 50px; width: 100px;"></td>
                                      <td>{{ $row->product_price }}</td>

                                      <td>{{ $row->status == 1 ? 'Active':'Inactive' }}</td>
                                      <td>
                                      @if($row->status == 1)
                                        <a href="{{ route('inactive-product', $row->id ) }}" class="btn btn-info"><i class="fa fa-arrow-up"></i></a>
                                        @else
                                        <a href="{{ route('active-product', $row->id ) }}" class="btn btn-warning"><i class="fa fa-arrow-down"></i></a>
                                        @endif
                                        

                                        <a class="btn btn-primary" href="{{ route('edit-product', $row->id) }}" role="button">Edit</a>
                                        <a class="btn btn-danger" href="{{ route('delete-product', $row->id) }}" role="button">Delete</a>
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




