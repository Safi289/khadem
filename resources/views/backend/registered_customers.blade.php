@extends('layouts.backend')

@section('home_content')









	<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Registered Customers</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                            <li class="breadcrumb-item active">Registered Customer List</li>
                        </ol>
                        @include('includes.message')

                      
                     
                        
                        <table class="table table-bordered" id="table_id">
                                  <thead>
                                    <tr>
                                      <th scope="col">#</th>
                                     
                                      <th scope="col">Customer Name</th>
                                      <th scope="col">Address</th>
                                      <th scope="col">City</th>
                                      <th scope="col">Email</th>
                                      <th scope="col">Customer Number</th>
                                      <!-- <th scope="col">Orded Products</th> -->
                                     
                                    </tr>
                                  </thead>
                                  <tbody>
                                  
                                    @php($i = 1)
                                    @foreach($customers as $row)
                                    <tr>
                                      <th scope="row">{{ $i }}</th>
                                      
                                      <td>{{ $row->name }}</td>
                                      <td>{{ $row->address }}</td>
                                      
                                      <td>{{ $row->city }}</td>
                                      <td>{{ $row->email }}</td>
                                      <td>{{ $row->phone }}</td>

                                     
                                      
                                     
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