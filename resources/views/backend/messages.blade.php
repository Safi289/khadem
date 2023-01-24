@extends('layouts.backend')

@section('home_content')









	<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Messages</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                            <li class="breadcrumb-item active">Messages</li>
                        </ol>
                        @include('includes.message')

                       

                     
                        
                        <table class="table table-bordered" id="table_id">
                                  <thead>
                                    <tr>
                                      <th scope="col">#</th>
                                      <th scope="col">Name</th>
                                      <th scope="col">Email</th>
                                      <th scope="col">Subject</th>
                                      <th scope="col">Message</th>
                                      <th scope="col">Action</th>
                                      <!-- <th scope="col">Orded Products</th> -->
                                     
                                    </tr>
                                  </thead>
                                  <tbody>
                                  
                                    @php($i = 1)
                                    @foreach($messages as $row)
                                    <tr>
                                      <th scope="row">{{ $i }}</th>
                                      <td>{{ $row->user_name }}</td>
                                      <td>{{ $row->user_email }}</td>
                                      
                                      <td>{{ $row->subject }}</td>
                                      <td>{{ $row->message }}</td>

                                     <td>
                                        <a class="btn btn-danger" href="{{ route('message-delete', $row->id) }}" role="button">Delete</a>
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