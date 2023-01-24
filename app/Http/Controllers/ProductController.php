<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use Session;

class ProductController extends Controller
{
    //product add form
    public function add_product()
    {
    	$categories = Category::where('status', 1)->orderBy('category_name', 'ASC')->get();

    	
    	return view('backend.product_add', compact('categories'));
    }

    //product save to database
    public function save_product(Request $request)
    {

    	
    	$request->validate([

    		'category_id'  => 'required',
    		'product_name' => 'required',
    		'product_price'=> 'required',
    		'product_image'=> 'required|mimes:jpg,jpeg,png'

    	]);

    	

    	$product_image = $request->file('product_image');


    	$name_generator  = hexdec(uniqid());
    	$image_extension = strtolower($product_image->getClientOriginalExtension());
    	$image_name      = $name_generator.'.'.$image_extension;
    	$up_location     = 'images/products/';
    	$last_image      = $up_location.$image_name;

    	

    	$product_image->move($up_location,$image_name);


    	$product = new Product;

    	$product->category_id            = $request->category_id;
    	$product->product_name           = $request->product_name;
        $product->writer                 = $request->writer;
        $product->publisher              = $request->publisher;
        $product->page_no                = $request->page_no;
        $product->size                   = $request->size;
    	$product->product_quantity       = $request->product_quantity;
    	$product->product_unit           = $request->product_unit;
    	$product->product_price_prev     = $request->product_price_prev;
    	$product->product_price          = $request->product_price;
    	$product->product_description    = $request->product_description;
    	$product->product_image          = $last_image; 

    	Session::flash('success', 'Save Successful!');

    	$product->save();


    	return back();

    }

    // all products view and manage page
    public function manage_product()
    {
    	
    	$product = Product::orderBy('products.id', 'DESC')
                    ->join('categories', 'products.category_id', '=', 'categories.id')
                    ->select('products.*', 'categories.category_name')
                    ->get();

    	


    	return view('backend.product_manage', compact('product'));
    }

    //product inactive
    public function inactive_product($id)
    {
        $product = Product::find($id);

        $product->status = 0;

        $product->save();

        Session::flash('success', 'Inactive Successful!');

        return back();
    }

    //product active
    public function active_product($id)
    {
        $product = Product::find($id);

        $product->status = 1;

        $product->save();

        Session::flash('success', 'Active Successful!');

        return back();
    }

    //product edit form
    public function edit_product($id)
    {
        $row = Product::orderBy('products.id', 'DESC')
                    ->join('categories', 'products.category_id', '=', 'categories.id')
                    ->select('products.*', 'categories.category_name')
                    ->where('products.id', $id)
                    ->first();

        $categories = Category::where('status', 1)->orderBy('category_name', 'ASC')->get();

        return view('backend.product_edit', compact('row', 'categories'));
    }


    //product update to database
    public function update_product(Request $request)
    {

       

        $request->validate([

            'category_id'  => 'required',
            'product_name' => 'required',
            'product_price'=> 'required',
            // 'product_image'=> 'required|mimes:jpg,jpeg,png'

        ]);


        $product_image_old = $request->product_image_old;

        $product_image = $request->file('product_image');


        if($product_image)
        {
            $name_generator  = hexdec(uniqid());
            $image_extension = strtolower($product_image->getClientOriginalExtension());
            $image_name      = $name_generator.'.'.$image_extension;
            $up_location     = 'images/products/';
            $last_image      = $up_location.$image_name;

            

            $product_image->move($up_location,$image_name);

            
            unlink($product_image_old);

            $product = Product::find($request->id);

            $product->category_id         = $request->category_id;
            $product->product_name        = $request->product_name;
            $product->writer              = $request->writer;
            $product->publisher           = $request->publisher;
            $product->page_no             = $request->page_no;
            $product->size                = $request->size;
            $product->product_quantity    = $request->product_quantity;
            $product->product_unit        = $request->product_unit;
            $product->product_price_prev  = $request->product_price_prev;
            $product->product_price       = $request->product_price;
            $product->product_image       = $last_image;
            $product->product_description = $request->product_description;
            $product->save();
        }

        else
        {

            $product = Product::find($request->id);

            $product->category_id         = $request->category_id;
            $product->product_name        = $request->product_name;
            $product->writer              = $request->writer;
            $product->publisher           = $request->publisher;
            $product->page_no             = $request->page_no;
            $product->size                = $request->size;
            $product->product_quantity    = $request->product_quantity;
            $product->product_unit        = $request->product_unit;
            $product->product_price_prev  = $request->product_price_prev;
            $product->product_price       = $request->product_price;
           
            $product->product_description = $request->product_description;
            $product->save();
        }

        Session::flash('success', 'Update Successful!');

        return redirect('product/manage-product');
    }
    

    //product delete
    public function delete_product($id)
    {

        $product = Product::find($id);
        $product_image_old = $product->product_image;
        unlink($product_image_old);

        
        $product->delete();

        Session::flash('success', 'Delete Successful!');

        return back();
    }    

    
}
