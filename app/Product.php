<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Product extends Model
{
    use softDeletes;
    protected $fillable = ['category_id', 'product_name', 'product_quantity', 'product_unit','product_price_prev', 'product_price','product_image', 'product_description'];
}
