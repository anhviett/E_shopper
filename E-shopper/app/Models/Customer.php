<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\Customer as Authenticable;

class Customer extends Authenticable
{
    use HasFactory;
    protected $table = 'tbl_customers';
    public function verifyCustomer(){
        return $this->hasOne(VerifyCustomer::class);
    }
}
