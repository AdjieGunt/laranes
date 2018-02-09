<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SellProductDetail extends Model
{
    //

    protected $table = 'sell_products_detail';
    public $timestamps = false;
    protected $fillable = [
        'sell_id',
        'sell_products_detail_product_id',
        'sell_products_detail_product_qty',
        'sell_products_detail_product_base',
        'sell_products_detail_product_packages',
        'sell_products_detail_created_by',
        'sell_products_detail_updated_by'
    ];
}
