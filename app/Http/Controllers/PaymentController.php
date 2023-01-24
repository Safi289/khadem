<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Payment;
use Session;

class PaymentController extends Controller
{
    //add payment method
    public function payment_method()
    {
    	$payment = Payment::orderBy('id', 'DESC')->get();
        return view('backend.payment', compact('payment'));
    }

    //payment method save to database
    public function save_payment_method(Request $request)
    {
  
    	$request->validate([

    		'method_name' => 'required|unique:payments,method_name'
    	]);

    	$payment = new Payment;

    	$payment->method_name        = $request->method_name;
        $payment->method_description = $request->method_description;
    	
    	$payment->save();

    	Session::flash('success', 'Save Successful!');

    	return back();
    }

    // //show all methods
    // public function manage_method()
    // {
    // 	$payment = Payment::orderBy('id', 'DESC')->get();

    // 	// return $payment; exit();

    // 	return view('backend.payment', compact('payment'));
    // }

    //edit methods
    public function edit_method($id)
    {
    	$row = Payment::find($id);
        return view('backend.payment_edit', compact('row'));
    }


     //method update to database
    public function update_method(Request $request)
    {

        
        $payment = Payment::find($request->id);

        $payment->method_name          = $request->method_name;
        $payment->method_description   = $request->method_description;
        
        $payment->save();

        Session::flash('success', 'Update Successful!');

        return redirect('payment-method');
    }

    //delete method
    public function delete_method($id)
    {
    	$payment = Payment::find($id);
    	$payment->delete();

    	Session::flash('success', 'Delete Successful!');

    	return back();
    }    
}
