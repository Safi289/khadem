<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Cart;
use App\Checkout;
use App\Order;
use App\Payment;
use App\Company;
use Session;
use PDF;
use App\Exports\InvoiceExport;
use Excel;
// use Barryvdh\DomPDF\Facade as PDF;

class CheckoutController extends Controller
{
    // checkout page view after cart
    public function index($user_ip)
    {
        $company = Company::orderBy('id', 'DESC')->first();
    	$category = Category::orderBy('id', 'DESC')->get();
        $payment  = Payment::orderBy('id', 'DESC')->get();
    	$order    = Cart::where('user_ip', $user_ip)->get();
    	$subtotal = Cart::all()->where('user_ip', request()->ip())->sum(function($t){
			return $t->product_price * $t->product_quantity;
			});

    	$shipping_price = Cart::all()->where('user_ip', request()->ip())->first();
    	

        $carts = Cart::where('user_ip', request()->ip())->latest()->get();
        $carts_row = $carts->count();


        if($carts_row > 0){
            return view('frontend.checkout', compact('category', 'order', 'subtotal', 'shipping_price', 'payment', 'company'));
            
        }
        else{

            return redirect('/');
        }
    }


    // place order from checkout page
    public function place_order(Request $request)
    {
        // return $request; exit();

        $request->validate([

            'customer_name'  => 'required',
            'phone_number'   => 'required',
            'address'        => 'required',
            'city'           => 'required',
            'payment'        => 'required',
            'notes'          => 'required'
        ]);

        $category = Category::orderBy('id', 'DESC')->get();

        $checkout = new Checkout;

        $checkout->customer_name = $request->customer_name;
        $checkout->phone_number  = $request->phone_number;
        $checkout->address       = $request->address;
        $checkout->city          = $request->city;
        $checkout->courier       = $request->courier;
        $checkout->payment       = $request->payment;
        $checkout->total_price   = $request->total_price;
        // $checkout->shipping_price= $shipping_price->shipping_price;
        $checkout->notes         = $request->notes;
        $checkout->user_ip       = $request->user_ip;
        $checkout->save();

    
        $cart_info = Cart::where('user_ip', $request->cart_ip)->get();

        $checkout_id = Checkout::orderBy('id', 'DESC')->first(); 
       

        foreach($cart_info as $row){

        $order = new Order;
        $order->checkout_id      = $checkout_id->id;
        $order->product_id       = $row->product_id;
        $order->product_quantity = $row->product_quantity;
        $order->product_price    = $row->product_price;
        $order->user_ip          = $row->user_ip;
        $order->save();


        }


        Cart::where('user_ip', $request->user_ip)->delete();


        return redirect('/confirmation');

    	
    }


    //oder detail view from admin dashboard
    public function order_detail($id)
    {
        $checkout = Checkout::where('checkouts.id', $id)
                    ->first();

        $checkout_cart = Checkout::where('checkouts.user_ip', $checkout->user_ip)
                            ->where('checkouts.id', $id)
                            ->where('orders.checkout_id', $id)
                            ->join('orders', 'orders.user_ip', '=', 'checkouts.user_ip')
                            ->join('products', 'products.id', '=', 'orders.product_id')
                            ->select('products.product_name', 'orders.product_quantity', 'orders.product_price', 'products.id', 'checkouts.shipping_price')
                            ->get();

      

        $subtotal = Order::all()->where('user_ip', $checkout->user_ip)
                                ->where('checkout_id', $id)
                
                                ->sum(function($t){
            return $t->product_price * $t->product_quantity;
        });

        
        return view('backend.order_detail', compact('checkout', 'checkout_cart', 'subtotal'));
    }

    // order delete from admin dashboard
    public function order_delete($id)
    {
        $checkout = Checkout::find($id);
        $order    = Order::where('checkout_id', $id)->get();

        foreach ($order as $row) {
            $row->delete();
        }

        $checkout->delete();
        

        Session::flash('success', 'Delete Successful!');

        return back();
    }

    //download invoice in pdf
    public function export_pdf($id)
    {
        $checkout = Checkout::where('checkouts.id', $id)
                    ->first();

        $company = Company::orderBy('id', 'DESC')
                    ->first();

        $checkout_cart = Checkout::where('checkouts.user_ip', $checkout->user_ip)
                            ->where('checkouts.id', $id)
                            ->where('orders.checkout_id', $id)
                            ->join('orders', 'orders.user_ip', '=', 'checkouts.user_ip')
                            ->join('products', 'products.id', '=', 'orders.product_id')
                            ->select('products.product_name', 'orders.product_quantity', 'orders.product_price', 'products.id', 'checkouts.shipping_price')
                            ->get();

      

        $subtotal = Order::all()->where('user_ip', $checkout->user_ip)
                                ->where('checkout_id', $id)
                                ->sum(function($t){
            return $t->product_price * $t->product_quantity;
        });

        $pdf = PDF::loadview('backend.invoice', compact('checkout', 'checkout_cart', 'subtotal', 'company'));


        return $pdf->setPaper('a4')->stream('invoice.pdf');
    }

    // download invoice in exel sheet
    public function export_excel($id)
    {
        return Excel::download(new InvoiceExport, 'invoice.xlsx');
    }
}
