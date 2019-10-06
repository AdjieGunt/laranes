<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{

    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
    protected $table = 'products';
    public $timestamps = false;

    protected $primaryKey = 'product_id';
    protected $fillable = [
        'product_name',
        'product_code',
        'product_created_date',
        'product_updated_date',
        'product_created_by',
        'product_updated_by',
        'product_description',
        'product_status'
    ];
}
