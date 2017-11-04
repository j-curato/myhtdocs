<?php

namespace App\Client;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = ['client_name','TIN','client_address','business_style','terms','osca_pwd_id'];

}
