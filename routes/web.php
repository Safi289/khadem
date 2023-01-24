<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

//frontend routes
Route::get('/', 'FrontendController@index')->name('index');
Route::get('/products/{id}', 'FrontendController@products')->name('products');
Route::get('/detail/{id}', 'FrontendController@detail')->name('detail');

Route::get('/confirmation', 'FrontendController@confirmation')->name('confirmation');

//customer registration
Route::get('/userregistration', 'FrontendController@userregistration')->name('userregistration');


//cart add
Route::post('/add-to-cart/{id}', 'CartController@add_to_cart')->name('add-to-cart');
// cart add from detail with quantity
Route::post('/add-cart-quantity/{id}', 'CartController@add_cart_quantity')->name('add-cart-quantity');

//cart page
Route::get('/cart-page', 'CartController@cart_page')->name('cart-page');
Route::get('/cart-destroy/{id}', 'CartController@cart_destroy')->name('cart-destroy');
Route::post('/cart-quantity-update/{id}', 'CartController@cart_quantity_update')->name('cart-quantity-update');

//checkout
Route::get('/checkout/{user_ip}', 'CheckoutController@index')->name('checkout');
//orderplace
Route::post('/place-order', 'CheckoutController@place_order')->name('place-order');

//category wise price filter
Route::post('/price-filter', 'FrontendController@price_filter')->name('price-filter');
//shop price filter
Route::post('/shop-filter', 'FrontendController@shop_filter')->name('shop-filter');

//search product by name
Route::post('/search', 'FrontendController@search')->name('search');
//search wise price filter
Route::post('/search-filter', 'FrontendController@search_filter')->name('search-filter');


//customer registration info save
Route::post('/customer-registration', 'FrontendController@customer_registration')->name('customer-registration');


//customer authentication
Route::get('customer/home', 'CustomerController@index')->name('customer.home');

Route::get('customer', 'Customer\LoginController@showLoginForm')->name('login.customer');
Route::post('customer', 'Customer\LoginController@login');
Route::post('customer/logout', 'CustomerController@logout')->name('customer-logout');

//shop page view
Route::get('shop', 'FrontendController@shop')->name('shop');

//customer memo export
Route::get('/export-pdf-customer/{id}', 'CheckoutController@export_pdf')->name('export-pdf-customer');

// customer contact
Route::get('contact', 'ContactController@contact')->name('contact');
Route::post('save-contact', 'ContactController@save_contact')->name('save-contact');

//customer info save
Route::post('save-customer', 'CustomerController@save_customer')->name('save-customer');
Route::get('delete-customer/{id}', 'CustomerController@delete_customer')->name('delete-customer');





//backend routes
Auth::routes();

Route::middleware(['auth'])->group(function(){

	Route::get('/dashboard', 'HomeController@index')->name('dashboard');

	//backend category routes
	Route::get('/category/add-category', 'CategoryController@add_category')->name('add-category');
	Route::post('/category/save-category', 'CategoryController@save_category')->name('save-category');
	Route::get('/category/manage-category', 'CategoryController@manage_category')->name('manage-category');
	Route::get('/category/inactive-category/{id}', 'CategoryController@inactive_category')->name('inactive-category');
	Route::get('/category/active-category/{id}', 'CategoryController@active_category')->name('active-category');
	Route::get('/category/delete-category/{id}', 'CategoryController@delete_category')->name('delete-category');

	Route::get('/category/edit-category/{id}', 'CategoryController@edit_category')->name('edit-category');
	Route::post('/category/update-category', 'CategoryController@update_category')->name('update-category');


	//backend product routes
	Route::get('/product/add-product', 'ProductController@add_product')->name('add-product');
	Route::post('/product/save-product', 'ProductController@save_product')->name('save-product');
	Route::get('/product/manage-product', 'ProductController@manage_product')->name('manage-product');
	Route::get('/product/inactive-product/{id}', 'ProductController@inactive_product')->name('inactive-product');
	Route::get('/product/active-product/{id}', 'ProductController@active_product')->name('active-product');
	Route::get('/product/delete-product/{id}', 'ProductController@delete_product')->name('delete-product');

	Route::get('/product/edit-product/{id}', 'ProductController@edit_product')->name('edit-product');
	Route::post('/product/update-product', 'ProductController@update_product')->name('update-product');

	//backend orders
	Route::get('/order-detail/{id}', 'CheckoutController@order_detail')->name('order-detail');
	Route::get('/order-delete/{id}', 'CheckoutController@order_delete')->name('order-delete');
	
	//export
	Route::get('/export-pdf/{id}', 'CheckoutController@export_pdf')->name('export-pdf');
	Route::get('/export-excel/{id}', 'CheckoutController@export_excel')->name('export-excel');

	//backend order search by product and date range
	Route::post('/product-search', 'HomeController@product_search')->name('product-search');
	

	//backend customer list
	Route::get('/customers', 'HomeController@customers')->name('customers');
	//customer search by product
	Route::post('/product-customer', 'HomeController@product_customer')->name('product-customer');

	//backend add order wise shipping price 
	Route::get('/add-shipping/{id}', 'HomeController@add_shipping')->name('add-shipping');
	//save shipping price
	route::post('/shipping-price', 'HomeController@shipping_price')->name('shipping-price');

	//backend payment method add
	Route::get('/payment-method', 'PaymentController@payment_method')->name('payment-method');
	Route::post('/save-payment', 'PaymentController@save_payment_method')->name('save-payment');
	Route::get('/delete-method/{id}', 'PaymentController@delete_method')->name('delete-method');
	Route::get('/edit-method/{id}', 'PaymentController@edit_method')->name('edit-method');
	Route::post('/update-payment', 'PaymentController@update_method')->name('update-payment');

	//customer messages
	Route::get('/messages', 'HomeController@messages')->name('messages');
	Route::get('/message-delete/{id}', 'HomeController@message_delete')->name('message-delete');

	//company info
	Route::get('/company', 'CompanyController@company')->name('company');
	Route::post('/save-company', 'CompanyController@save_company')->name('save-company');
	Route::get('/delete-company/{id}', 'CompanyController@delete_company')->name('delete-company');
	Route::get('/edit-company/{id}', 'CompanyController@edit_company')->name('edit-company');
	Route::post('/update-company', 'CompanyController@update_company')->name('update-company');

	//registered customers list
	Route::get('/registered-customers', 'HomeController@registered_customers')->name('registered-customers');

	//admin profile
	Route::get('/admin-profile/{id}', 'HomeController@admin_profile')->name('admin-profile');
	Route::post('/update-admin', 'HomeController@update_admin')->name('update-admin');
	
	// Route::post('logout', 'HomeController@logout')->name('logout');
});