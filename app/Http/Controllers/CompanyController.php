<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use Session;

class CompanyController extends Controller
{
	//show company page
    public function company()
    {
    	$row = Company::orderBy('id', 'DESC')->first();
    	return view('backend.company', compact('row'));
    }

    //save company info
    public function save_company(Request $request)
    {
    	$request->validate([

    		'company_name'           => 'required',
    		'company_description'    => 'required',
    		'company_phone'          => 'required',
    		'company_email'          => 'required',
    		'company_address'        => 'required',
    		'company_logo'           => 'required|mimes:jpg,jpeg,png'
    	]);

    	$company_logo = $request->file('company_logo');


    	$name_generator  = hexdec(uniqid());
    	$image_extension = strtolower($company_logo->getClientOriginalExtension());
    	$image_name      = $name_generator.'.'.$image_extension;
    	$up_location     = 'images/company/';
    	$last_image      = $up_location.$image_name;

    	$company_logo->move($up_location,$image_name);

    	$company = new Company;

    	$company->company_name          = $request->company_name;
        $company->company_description   = $request->company_description;
        $company->company_phone         = $request->company_phone;
        $company->company_email         = $request->company_email;
        $company->company_address       = $request->company_address;
        $company->company_logo          = $last_image;
    	
    	$company->save();

    	Session::flash('success', 'Send Successful!');

    	return back();
    }

    // public function manage_company()
    // {
    // 	// echo 'hello'; exit();
    // 	$row = Company::orderBy('id', 'DESC')->first();
                   
                    
    // 	return view('backend.company', compact('row'));
    // }

    //edit company info
    public function edit_company($id)
    {
        $row = Company::orderBy('id', 'DESC')
                    ->where('id', $id)
                    ->first();

        return view('backend.company_edit', compact('row'));
    }


      //company update to database
    public function update_company(Request $request)
    {

       

        $request->validate([

            'company_name'           => 'required',
    		'company_description'    => 'required',
    		'company_phone'          => 'required',
    		'company_email'          => 'required',
    		'company_address'        => 'required'
            // 'product_image'=> 'required|mimes:jpg,jpeg,png'

        ]);


        $company_logo_old = $request->company_logo_old;

        $company_logo = $request->file('company_logo');


        if($company_logo)
        {
            $name_generator  = hexdec(uniqid());
            $image_extension = strtolower($company_logo->getClientOriginalExtension());
            $image_name      = $name_generator.'.'.$image_extension;
            $up_location     = 'images/company/';
            $last_image      = $up_location.$image_name;

            

            $company_logo->move($up_location,$image_name);

            
            unlink($company_logo_old);

            $company = Company::find($request->id);

            

	    	$company->company_name          = $request->company_name;
	        $company->company_description   = $request->company_description;
	        $company->company_phone         = $request->company_phone;
	        $company->company_email         = $request->company_email;
	        $company->company_address       = $request->company_address;
	        $company->company_logo          = $last_image;
	    	
	    	$company->save();
        }

        else
        {

            $company = Company::find($request->id);

            

	    	$company->company_name          = $request->company_name;
	        $company->company_description   = $request->company_description;
	        $company->company_phone         = $request->company_phone;
	        $company->company_email         = $request->company_email;
	        $company->company_address       = $request->company_address;
	       
	    	
	    	$company->save();
        }

        Session::flash('success', 'Update Successful!');

        return redirect('company');
    }

    //delete company
    public function delete_company($id)
    {
    	$company = Company::find($id);
    	$company->delete();

    	Session::flash('success', 'Delete Successful!');

    	return back();
    }    
}
