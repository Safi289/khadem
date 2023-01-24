<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Company;
use App\Customer;
use Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:customer');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    //customer dashboard page
    public function index()
    {
        $category = Category::orderBy('id', 'DESC')->get();
        $company  = Company::orderBy('id', 'DESC')->first();
        $customer = Customer::orderBy('id', 'DESC')->first();

        // return $customer->bcrypt('password'); exit();
        
        return view('customer.home', compact('category', 'company', 'customer'));
    }

    //customer info save
    public function save_customer(Request $request)
    {
        $customer = Customer::find($request->customer_id);

        $customer->name    = $request->name;
        $customer->email   = $request->email;
        $customer->normal  = $request->password;
        $customer->password= Hash::make($request->password);
        $customer->address = $request->address;
        $customer->phone   = $request->phone;
        $customer->city    = $request->city;

        $customer->save();

        return redirect('customer/home');
    }

    //delete customer
    public function delete_customer($id)
    {
        $customer = Customer::find($id);
        $customer->delete();

        Session::flash('success', 'Delete Successful!');

        return redirect('/');
    }

    protected function guard()
    {
        return Auth::guard('customer');
    }


    //customer logut
    public function logout(Request $request)
    {
        $this->guard('customer')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        if ($response = $this->loggedOut($request)) {
            return $response;
        }

        return $request->wantsJson()
            ? new JsonResponse([], 204)
            : redirect('/customer');
    }
    protected function loggedOut(Request $request)
    {
        
    }
}
