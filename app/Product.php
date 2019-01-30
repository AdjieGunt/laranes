<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    public $timestamps = false;

    protected $primaryKey = 'product_id';
    protected $fillable = [
        'product_name',
        'product_created_date',
        'product_updated_date',
        'product_created_by',
        'product_updated_by',
        'product_description',
        'product_status'
    ];
}
