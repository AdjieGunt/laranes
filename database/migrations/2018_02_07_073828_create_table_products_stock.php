<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableProductsStock extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_stock', function (Blueprint $table) {
            $table->increments('stock_id');
            $table->integer('stock_product_id')->unsigned();
            $table->integer('stock_product_color_base');
            $table->integer('stock_product_qty');
            $table->string('stock_product_packages');                        
            $table->timestamps();

            $table->foreign('stock_product_id', 'stock_product_id')->references('product_id')->on('products');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products_stock');
    }
}
