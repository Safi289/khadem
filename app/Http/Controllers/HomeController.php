<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Checkout;
use App\Cart;
use App\Product;
use App\Order;
use App\Contact;
use App\Customer;
use App\Company;
use App\User;
use DB;
use Session;
use Illuminate\Support\Facades\Hash;



class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $company = Company::orderBy('id', 'DESC')->first();
        $product = Product::orderBy('id', 'DESC')
                    ->select('id', 'product_name')
                    ->get();
        $orders = Checkout::orderBy('id', 'DESC')->get();

       
        return view('backend.home', compact('orders', 'product'));
    }


    // order search based on product and date range
    public function product_search(Request $request)
    {

        

        $product = Product::orderBy('id', 'DESC')
                    ->select('id', 'product_name')
                    ->get();

        $orders = Product::where('products.id', $request->product_id)
                            ->where('checkouts.created_at', '>=', $request->start_time)
                            ->where('checkouts.created_at', '<=', $request->end_time)
                            ->join('orders', 'orders.product_id', '=', 'products.id')
                            ->join('checkouts', 'checkouts.id', '=', 'orders.checkout_id')
                            ->orderBy('checkouts.id', 'DESC')
                            ->get();


        return view('backend.home', compact('orders', 'product'));
    }


    //ordered customer list 
    public function customers()
    {
        $product = Product::orderBy('id', 'DESC')
                    ->select('id', 'product_name')
                    ->get();
        $orders = Checkout::orderBy('id', 'DESC')->get();
  
        return view('backend.customers', compact('orders', 'product'));
        
    }

    //registered customers list
    public function registered_customers()
    {

        $customers = Customer::orderBy('id', 'DESC')->get();
  
        return view('backend.registered_customers', compact('customers'));
        
    }

    // ordered customer page search by product
    public function product_customer(Request $request)
    {

        $product = Product::orderBy('id', 'DESC')
                    ->select('id', 'product_name')
                    ->get();

        $orders = Product::where('products.id', $request->product_id)
                            ->join('orders', 'orders.product_id', '=', 'products.id')
                            ->join('checkouts', 'checkouts.id', '=', 'orders.checkout_id')
                            ->orderBy('checkouts.id', 'DESC')
                            ->get();

        return view('backend.customers', compact('orders', 'product'));
    }

    //order wise shipping price add page  
    public function add_shipping($id)
    {

        return view('backend.shipping', compact('id'));
    }


    //shipping price add to particuler order
    public function shipping_price(Request $request)
    {
        
        $request->validate([

            'shipping_price' => 'required'
        ]);

        DB::table('checkouts')
            ->where('id', $request->id)
            ->update(['shipping_price' => $request->shipping_price]);

        
        Session::flash('success', 'Shipping Cost Added!');
        return \Redirect::route('order-detail', $request->id);
        
    }


    //user messages show in backend
    public function messages()
    {
        $messages = Contact::orderBy('id', 'DESC')->get();
        return view('backend.messages', compact('messages'));
    }
   
   //delete user message from backend
    public function message_delete($id)
    {
        $contact = Contact::find($id);
        
        $contact->delete();
        

        Session::flash('success', 'Delete Successful!');

        return back();
    }


    public function admin_profile($id)
    {
        // return $id; exit();
        $admin = User::where('id', $id)->first();


        return view('backend.admin_profile', compact('admin', 'id'));
    }
    
    public function update_admin(Request $request)
    {
        // return $request; exit();
        $request->validate([

            'name'     => 'required',
            'email'    => 'required',
            'password' => 'required'
        ]);


        $admin = User::find($request->id);

        $admin->name     = $request->name;
        $admin->email    = $request->email;
        $admin->normal   = $request->password;
        $admin->password = Hash::make($request->password);
        $admin->save();

        Session::flash('success', 'Update Successful!');
        return \Redirect::route('dashboard');
    }
    
}
