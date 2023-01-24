@extends('layouts.backend')

@section('home_content')






	<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Add Product</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                            <li class="breadcrumb-item active">Product</li>
                            <li class="breadcrumb-item active">Add Product</li>
                        </ol>
                        
                

                            <form method="POST" action="{{ route('save-product') }}" enctype="multipart/form-data">

                                   @csrf

                                  @include('includes.message')

                                  <a class="btn btn-primary" href="{{ route('manage-product') }}" role="button">Manage Product</a><br><br>

                                  <div class="form-group">

                                    
                                    <label for="category">Category *</label>
                                    <select class="form-control col-sm-4" id="category" name="category_id">
                                        <option value="">Select Category</option>
                                        @foreach($categories as $row)
                                        <option value="{{ $row->id }}">{{ $row->category_name }}</option>
                                        @endforeach
                                    </select>
                                   
                                  </div>

                                  <div class="form-group">

                                    
                                    <label for="category_name">Product Name *</label>
                                    <input type="text" name="product_name" class="form-control col-sm-4" id="product_name" value="{{ old('category_name') }}" placeholder="Enter Product Name" required="">


                                    
                                    <br>
                                    <label for="category_name">Writer</label>
                                    <input type="text" name="writer" class="form-control col-sm-4" id="writer" value="{{ old('category_name') }}" placeholder="Enter Writer Name">


                                    
                                    <br>
                                    <label for="category_name">Publisher</label>
                                    <input type="text" name="publisher" class="form-control col-sm-4" id="publisher" value="{{ old('category_name') }}" placeholder="Enter Publisher Name">


                                    
                                    <br>
                                    <label for="category_name">Page No.</label>
                                    <input type="text" name="page_no" class="form-control col-sm-4" id="page_no" value="{{ old('category_name') }}" placeholder="Enter Page No.">


                                    
                                    <br>
                                    <label for="category_name">Size</label>
                                    <input type="text" name="size" class="form-control col-sm-4" id="page_no" value="{{ old('category_name') }}" placeholder="Enter Size">


                                    
                                    <br>
                                    <div></div>
                                    <label for="quantity">Quantity</label>
                                    <input type="text" name="product_quantity" class="form-control col-sm-4" id="product_quantity" value="{{ old('category_name') }}" placeholder="Enter Product Quantity">
                                    <br>

                                    <label for="quantity">Unit</label>
                                    <input type="text" name="product_unit" class="form-control col-sm-4" id="product_unit" value="{{ old('category_name') }}" placeholder="Enter Product unit">

                                    <br>

                                    <label for="quantity">Previous Price</label>
                                    <div class="form-inline">
                                    <input type="text" name="product_price_prev" class="form-control col-sm-4" id="product_price" value="{{ old('category_name') }}" placeholder="Enter Product price">  &#2547</div>

                                    <br>

                                    <label for="quantity">Present Price *</label>
                                    <div class="form-inline">
                                    <input type="text" name="product_price" class="form-control col-sm-4" id="product_price" value="{{ old('category_name') }}" placeholder="Enter Product price" required="">  &#2547</div>
                                    <br>


                                    

                                    <label for="exampleFormControlFile1">Product Image *</label>
                                    <input type="file" name="product_image" class="form-control-file" id="exampleFormControlFile1" required>

                                    <br>

                                    
                                    <label for="exampleFormControlTextarea1">Product Description</label>
                                    <textarea class="form-control" name="product_description" id="exampleFormControlTextarea1" rows="3" required></textarea>
     
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