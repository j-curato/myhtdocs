<?php

namespace App\Payment;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [ 'orNumber','sales_number', 'client_id', 'amount_paid', 'status' ];
}
