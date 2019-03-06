<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    //
    protected $table = 'customers';
    public $timestamps = true;

    protected $primaryKey = 'customer_id';
    protected $fillable = [
        'customer_name',
        'customer_phone',
        'customer_email',
        'customer_address',
        'created_at',
        'updated_at',
    ];
}
