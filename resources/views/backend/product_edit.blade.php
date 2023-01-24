@extends('layouts.backend')

@section('home_content')







	<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Edit Product</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                            <li class="breadcrumb-item active">Product</li>
                            <li class="breadcrumb-item active">Edit Product</li>
                        </ol>
                        
                

                            <form method="POST" action="{{ route('update-product') }}" enctype="multipart/form-data">

                                   @csrf

                                  @include('includes.message')

                                  <a class="btn btn-primary" href="{{ route('manage-product') }}" role="button">Manage Product</a><br><br>

                                
                                  <div class="form-group">

                                    
                                    <label for="category">Category</label>
                                    <input type="hidden" name="category_id">
                                    <select class="form-control col-sm-4" id="category" name="category_id">
                                        <option value="{{ $row['category_id'] }}">{{ $row['category_name'] }}</option>
                                        @foreach($categories as $key)
                                        <option value="{{ $key->id }}">{{ $key->category_name }}</option>
                                        @endforeach
                                    </select>
                                   
                                  </div>
                                  

                                    <input type="hidden" name="id" value="{{ $row['id'] }}">
                                    <label for="category_name">Product Name</label>
                                    <input type="text" name="product_name" class="form-control col-sm-4" id="product_name" value="{{ $row['product_name'] }}" placeholder="Enter Product Name" required="">


                                    
                                    <br>
                                    <label for="category_name">Writer</label>
                                    <input type="text" name="writer" class="form-control col-sm-4" id="writer" value="{{ $row['writer'] }}" placeholder="Enter writer">


                                    
                                    <br>
                                    <label for="category_name">Publisher</label>
                                    <input type="text" name="publisher" class="form-control col-sm-4" id="publisher" value="{{ $row['publisher'] }}" placeholder="Enter publisher">


                                    
                                    <br>
                                    <label for="category_name">Page No.</label>
                                    <input type="text" name="page_no" class="form-control col-sm-4" id="page_no" value="{{ $row['page_no'] }}" placeholder="Enter Size">


                                    
                                    <br>
                                    <label for="category_name">Size</label>
                                    <input type="text" name="size" class="form-control col-sm-4" id="size" value="{{ $row['size'] }}" placeholder="Enter page no.">


                                    
                                    <br>
                                    <div></div>
                                    <label for="quantity">Quantity</label>
                                    <input type="text" name="product_quantity" class="form-control col-sm-4" id="product_quantity" value="{{ $row['product_quantity'] }}" placeholder="Enter Product Quantity">
                                    <br>

                                    <label for="quantity">Unit</label>
                                    <input type="text" name="product_unit" class="form-control col-sm-4" id="product_unit" value="{{ $row['product_unit'] }}" placeholder="Enter Product unit">

                                    <br>

                                    <label for="quantity">Previous Price</label>
                                    <div class="form-inline">
                                    <input type="text" name="product_price_prev" class="form-control col-sm-4" id="product_price" value="{{ $row['product_price_prev'] }}" placeholder="Enter Product price">  &#2547</div>

                                    <br>

                                    <label for="quantity">Present Price</label>
                                    <div class="form-inline">
                                    <input type="text" name="product_price" class="form-control col-sm-4" id="product_price" value="{{ $row['product_price'] }}" placeholder="Enter Product price" required="">  &#2547</div>
                                    <br>


                                    

                                    <label for="exampleFormControlFile1">Product Image</label>
                                    <input type="hidden" value="{{ $row->product_image }}" name="product_image_old">
                                    <input type="file" name="product_image" class="form-control-file" id="exampleFormControlFile1">
                                    <img src="{{ asset($row->product_image) }}" style="height: 50px; width: 100px;">

                                    <br>

                                    
                                    <label for="exampleFormControlTextarea1">Product Description</label>
                                    <textarea class="form-control" name="product_description" id="exampleFormControlTextarea1" rows="3" value="">{{ $row['product_description'] }}</textarea>
     
                                  
   
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


