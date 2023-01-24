<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = ['company_name', 'company_description', 'company_phone', 'company_email', 'company_address', 'company_logo'];

}
