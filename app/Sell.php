<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sell extends Model
{
    //
    protected $table = 'sell';
    public $timestamps = false;
    protected $fillable = ['sell_flag', 'sell_created_by', 'sell_updated_by'];
}