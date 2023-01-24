<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Category extends Model
{
    use softDeletes;
    protected $fillable = ['category_name', 'category_description','category_slug'];
}
