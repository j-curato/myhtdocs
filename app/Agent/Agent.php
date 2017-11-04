<?php

namespace App\Agent;

use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    protected $fillable = ['fname','lname','sex','age','address','contact_num', 'date_of_birth'];


    
    public function sales(){

    	return $this->hasMany('App\Sale\Sale');

    }


    public function getFullNameAttribute($value){
    	return ucwords($value);
    }


}
