<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableSellProductsDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sell_products_detail', function (Blueprint $table) {
            $table->increments('sell_products_detail_id');
            $table->integer('sell_id')->unsigned();            
            $table->integer('sell_products_detail_product_id')->unsigned();
            $table->integer('sell_products_detail_product_qty');
            $table->enum('sell_products_detail_product_base', ['2.5 L', '20 L', '5 Kg', '25 Kg']);                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               
            $table->string('sell_products_detail_product_packages', 150);                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    
            $table->timestamp('sell_products_detail_created_date');
            $table->timestamp('sell_products_detail_updated_date')->nullable();
            $table->integer('sell_products_detail_created_by')->unsigned();                                                                                                
            $table->integer('sell_products_detail_updated_by')->unsigned();
            
            $table->foreign('sell_id','sell_in_id')->references('sell_id')->on('sell');            
            $table->foreign('sell_products_detail_product_id', 'product_id')->references('product_id')->on('products');
            $table->foreign('sell_products_detail_created_by','created_by')->references('user_id')->on('users');
            $table->foreign('sell_products_detail_updated_by','updated_by')->references('user_id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sell_products_detail');
    }
}
