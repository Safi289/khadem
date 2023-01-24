<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Contact;
use App\Company;
use Session;

class ContactController extends Controller
{
    public function contact()
    {
        $company = Company::orderBy('id', 'DESC')->first();
    	$category = Category::orderBy('id', 'DESC')->get();
    	return view('frontend.contact', compact('category', 'company'));
    }

    public function save_contact(Request $request)
    {
    	$request->validate([

    		'user_name'  => 'required',
    		'user_email' => 'required',
    		'subject'    => 'required',
    		'message'    => 'required'
    	]);

    	$contact = new Contact;

    	$contact->user_name          = $request->user_name;
        $contact->user_email         = $request->user_email;
        $contact->subject            = $request->subject;
        $contact->message            = $request->message;
    	
    	$contact->save();

    	Session::flash('success', 'Send Successful!');

    	return back();
    }
}
