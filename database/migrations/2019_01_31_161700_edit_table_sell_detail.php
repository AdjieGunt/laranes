<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditTableSellDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sell_products_detail', function (Blueprint $table) {
            //
            $table->string('sell_products_detail_product_color',10);                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sell_products_detail', function (Blueprint $table) {
            //
        });
    }
}
