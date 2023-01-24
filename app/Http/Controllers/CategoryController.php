<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use Session;

class CategoryController extends Controller
{
    // add category form
    public function add_category()
    {
    	return view('backend.category_add');
    }

    // category save to database
    public function save_category(Request $request)
    {
    	$request->validate([

    		'category_name' => 'required|unique:categories,category_name'
    	]);

    	$category = new Category;

    	$category->category_name        = $request->category_name;
        $category->category_description = $request->category_description;
    	$category->category_slug        = $request->category_name;
    	$category->save();

    	Session::flash('success', 'Save Successful!');

    	return back();

    }

    // all category view and manage page
    public function manage_category()
    {
    	$category = Category::orderBy('id', 'DESC')->get();
        return count($category);

    	return view('backend.category_manage', compact('category'));
    }

    //category inactive
    public function inactive_category($id)
    {
        $category = Category::find($id);

        $category->status = 0;

        $category->save();

        Session::flash('success', 'Inactive Successful!');

        return back();
    }

    //category active
    public function active_category($id)
    {
        $category = Category::find($id);

        $category->status = 1;

        $category->save();

        Session::flash('success', 'Active Successful!');

        return back();
    }

    // edit category form
    public function edit_category($id)
    {
        $row = Category::find($id);
        return view('backend.category_edit', compact('row'));
    }

    // category update to database
    public function update_category(Request $request)
    {


        $category = Category::find($request->id);

        $category->category_name = $request->category_name;
        $category->category_description = $request->category_description;
        $category->category_slug = $request->category_name;
        $category->save();

        Session::flash('success', 'Update Successful!');

        return redirect('category/manage-category');
    }

    // category delete
	public function delete_category($id)
    {
    	$category = Category::find($id);
        $product  = Product::where('category_id', $id)->get();

        foreach($product as $row)
        {
            $row->delete();
        }

    	$category->delete();

    	Session::flash('success', 'Delete Successful!');

    	return back();
    }


}
