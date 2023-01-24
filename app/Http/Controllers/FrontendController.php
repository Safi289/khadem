<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App\Order;
use App\Checkout;
use App\Customer;
use App\Company;
use Session;
use Redirect;
use View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class FrontendController extends Controller
{
    //home page view
    public function index()
    {
        
        $company = Company::orderBy('id', 'DESC')->first();
        $category = Category::orderBy('id', 'DESC')->get();
        $product  = Product::orderBy('id', 'DESC')
                            ->limit(10)
                            ->get();

        $category_limit = Category::orderBy('id', 'DESC')
                                ->where('status', '=', 1)
                                ->limit(2)->get();

        $discount = Product::orderBy('id', 'DESC')
                            ->where('product_price_prev', '>', 0)
                            ->latest()
                            
                            ->get();
        // return $discount; exit();

        return view('frontend.home', compact('category', 'product', 'discount', 'company', 'category_limit'));
    	
    }

    // category wise produts page
    public function products($id)
    {
        
        $company = Company::orderBy('id', 'DESC')->first();
        $category = Category::orderBy('id', 'DESC')->get();
        $category_name = Category::where('id', $id)->first();

        $product  = Product::orderBy('products.id', 'DESC')
                    ->join('categories', 'categories.id','=', 'products.category_id')
                    ->where('categories.id', $id)
                    ->select('products.*')
                    ->latest()->paginate(8);

                   
    	return view('frontend.products', compact('category','product', 'category_name', 'company'));
    }

    // category wise products price filter view
    public function price_filter(Request $request)
    {
        $company = Company::orderBy('id', 'DESC')->first();
        
        $category = Category::orderBy('id', 'DESC')->get();
        $category_name = Category::where('id', $request->category_id)->first();

        $product  = Product::orderBy('products.id', 'DESC')
                    ->join('categories', 'categories.id','=', 'products.category_id')
                    ->where('categories.id', $request->category_id)
                    ->where('product_price' , '>=', $request->start_price)
                    ->where('product_price' , '<=', $request->end_price)
                    ->select('products.*')
                    ->latest()->paginate(8);
       
        
        return view('frontend.products', compact('category','product', 'category_name', 'company'));


    }

    // shop price filter view
    public function shop_filter(Request $request)
    {
        $company = Company::orderBy('id', 'DESC')->first();
        
        $category = Category::orderBy('id', 'DESC')->get();
        $category_name = Category::where('id', $request->category_id)->first();

        $product  = Product::orderBy('products.id', 'DESC')
                    ->where('product_price' , '>=', $request->start_price)
                    ->where('product_price' , '<=', $request->end_price)
                    ->select('products.*')
                    ->latest()->paginate(8);
       
        return view('frontend.shop', compact('category','product', 'category_name', 'company'));

    }


    //search price filter view
    public function search_filter(Request $request)
    {
        $company = Company::orderBy('id', 'DESC')->first();
        $category = Category::orderBy('id', 'DESC')->get();
        $category_name = Category::where('id', $request->category_id)->first();

        $search_txt = $request->search_txt;
        $search  = Product::orderBy('products.id', 'DESC')
                    ->where('product_price' , '>=', $request->start_price)
                    ->where('product_price' , '<=', $request->end_price)
                    ->where('product_name', 'like', '%'.$search_txt.'%')
                    ->select('products.*')
                    ->latest()->paginate(8);
       
        
        return view('frontend.search', compact('category','search', 'category_name', 'search_txt', 'company'));


    }

    // single product detail page
    public function detail($id)
    {
        $company = Company::orderBy('id', 'DESC')->first();
        $category = Category::orderBy('id', 'DESC')->get();
        $product  = Product::orderBy('products.id', 'DESC')
                    ->join('categories', 'products.category_id', '=', 'categories.id')
                    ->select('products.*', 'categories.category_name')
                    ->where('products.id', $id)
                    ->first();

    	return view('frontend.detail', compact('category', 'product', 'company'));
    }

   

    //confirmation page after chackout
    public function checkout()
    {
    	return view('frontend.checkout');
    }

    public function confirmation()
    {
        $company = Company::orderBy('id', 'DESC')->first();
        $category = Category::orderBy('id', 'DESC')->get();
        $checkout = Checkout::orderBy('id', 'DESC')
                    ->first();
        $checkout_cart = Checkout::where('checkouts.user_ip', $checkout->user_ip)
                            ->where('checkouts.id', $checkout->id)
                            ->where('orders.checkout_id', $checkout->id)
                            ->join('orders', 'orders.user_ip', '=', 'checkouts.user_ip')
                            ->join('products', 'products.id', '=', 'orders.product_id')
                            ->select('products.product_name', 'orders.product_quantity', 'orders.product_price', 'products.id')
                            ->get();
        $subtotal = Order::all()->where('user_ip', $checkout->user_ip)
                                ->where('checkout_id', $checkout->id)
                
                                ->sum(function($t){
            return $t->product_price * $t->product_quantity;
        });

    	return view('frontend.confirmation', compact('category','checkout', 'checkout_cart', 'subtotal', 'company'));
    }

    //not necessary
    // public function userlogin()
    // {
    //     $category = Category::orderBy('id', 'DESC')->get();
    // 	return view('frontend.userlogin', compact('category'));
    // }

    // customer registration page view
    public function userregistration()
    {
        $company = Company::orderBy('id', 'DESC')->first();
        $category = Category::orderBy('id', 'DESC')->get();
    	return view('frontend.userregistration', compact('category', 'company'));
    }

    // customer registration and redirect to customer login page
    public function customer_registration(Request $request)
    {
       
        $request->validate([

            'name' => 'required',
            'email' => 'required|unique:customers,email',
            'password' => 'required'
        ]);

        $customer = new Customer;

        $customer->name     = $request->name;
        $customer->email    = $request->email;
        $customer->password = Hash::make($request->password);
        $customer->remember_token = $request->_token;
        $customer->save();

        Session::flash('success', 'Registration Successful! login to view profile');

        return redirect('customer');


    }

    // all products view page
    public function shop()
    {   
        $company = Company::orderBy('id', 'DESC')->first();
        $category = Category::orderBy('id', 'DESC')->get();

        $product  = Product::orderBy('id', 'DESC')    
                    ->latest()
                    ->paginate(8);

                    
        return view('frontend.shop', compact('category','product', 'company'));
    }


    //search by product name
    public function search(Request $request)
    {
        $company = Company::orderBy('id', 'DESC')->first();
       
        $category = Category::orderBy('id', 'DESC')->get();
        $this->validate($request, [
            'search' => 'required'
        ]);

        $search_txt = $request->search;
       
        $search = Product::orderBy('id', 'DESC')
                    ->where('product_name', 'like', '%'.$search_txt.'%')
                    ->latest()->paginate(8);
       
        return view('frontend.search', compact('search', 'category', 'search_txt', 'company'));
    }
}



