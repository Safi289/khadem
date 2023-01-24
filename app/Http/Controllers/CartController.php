<?php

namespace App\Http\Controllers;
use App\Cart;
use App\Category;
use App\Product;
use App\Company;
// use App\Redirect;
use Session;

use Illuminate\Http\Request;

class CartController extends Controller
{
	//add to cart without from detail
    public function add_to_cart(Request $request, $product_id)
    {
    	$check = Cart::where('product_id', $product_id)->where('user_ip', request()->ip())->first();

    	if($check)
    	{
    		Cart::where('product_id', $product_id)->increment('product_quantity');

    		Session::flash('success', 'Item Added On Cart!');
    		return redirect('cart-page'); 
    	}
    	else
    	{
    		Cart::insert([
    		'product_id'       => $product_id,
    		'product_quantity' => 1,
    		'product_price'    => $request->product_price,
    		'user_ip'          => request()->ip()
    		]);

    		Session::flash('success', 'Item Added On Cart!');
    		return redirect('cart-page'); 
    	}
    	

		   
	}

	//add to cart from detail page with product quantity
	public function add_cart_quantity(Request $request, $product_id)
    {

    	
    	$check = Cart::where('product_id', $product_id)->where('user_ip', request()->ip())->first();

    	if($check)
    	{
    		Cart::where('product_id', $product_id)->increment('product_quantity', $request->quantity);

    		Session::flash('success', 'Item Added On Cart!');
    		return back(); 
    	}
    	else
    	{
    		Cart::insert([
    		'product_id'       => $product_id,
    		'product_quantity' => $request->quantity,
    		'product_price'    => $request->product_price,
    		'user_ip'          => request()->ip()
    		]);

    		Session::flash('success', 'Item Added On Cart!');
    		return back(); 
    	}
    	

		   
	}


	// view cart page
	public function cart_page()
	{

		$company = Company::orderBy('id', 'DESC')->first();
        $product  = Product::latest()->paginate(1);

        
		$category = Category::orderBy('id', 'DESC')->get();
		$carts = Cart::where('user_ip', request()->ip())->latest()->get();
		$carts_row = $carts->count();
		

		// return $carts_row; exit();

		$subtotal = Cart::all()->where('user_ip', request()->ip())->sum(function($t){
			return $t->product_price * $t->product_quantity;
		});

		if($carts_row > 0){
			return view('frontend.cart', compact('category', 'carts', 'subtotal', 'company'));
			
		}
		else{

			return redirect('/');
		}

		
	}

	// cart delete page
	public function cart_destroy($id)
	{
	
		$carts = Cart::where('user_ip', request()->ip())->latest()->get();
		$carts_row = $carts->count();

		
		Cart::where('id', $id)->where('user_ip', request()->ip())->delete();

		if($carts_row > 0)
		{
			Session::flash('success', 'Item Deleted!');
			return back();
		}
		else{
			return redirect('/');
		}

	}

	//quantity update in cart
	public function cart_quantity_update(Request $request, $id)
	{
		Cart::where('id', $id)->where('user_ip', request()->ip())->update([

			'product_quantity' => $request->product_quantity	
		]);
		Session::flash('success', 'Quantity Updated!');
		return back();
	}

}
