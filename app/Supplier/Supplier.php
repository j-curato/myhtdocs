<?php

namespace App\Supplier;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    //
    protected $fillable = ['name','address','contact_number','TIN'];
}
