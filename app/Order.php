<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Order extends Model
{
    	protected $fillable = ['checkout_id', 'product_id', 'product_quantity', 'product_price', 'user_ip'];

    public function product()
   	{
   		return $this->belongsTo(product::class, 'product_id');

   		
   	}

   	public function checkout()
   	{
   		return $this->belongsTo(checkout::class, 'checkout_id');

   		
   	}

   	public static function get_order()
   	{
   		$records = DB::table('orders')
   					->join('checkouts', 'checkouts.id', '=', 'orders.checkout_id')
   					->join('products', 'products.id', '=', 'orders.product_id')
   					->select('orders.id', 'orders.checkout_id', 'orders.product_id', 'orders.product_quantity', 'orders.product_price', 'orders.user_ip', 'orders.created_at', 'checkouts.customer_name', 'products.product_name')->orderBy('orders.id', 'ASC')->get()->toArray();

   		return $records;
   	}
}
