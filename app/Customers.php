<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customers extends Model
{
    //
    use SoftDeletes;
    protected $table = 'customers';
    public $timestamps = true;

    protected $primaryKey = 'customer_id';
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'customer_name',
        'customer_phone',
        'customer_email',
        'customer_address',
        'created_at',
        'updated_at',
    ];
}
