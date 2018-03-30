<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableStock extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock', function (Blueprint $table) {
            $table->increments('stock_id');
            $table->integer('stock_product_id')->unsigned();
            $table->string('stock_product_color_base');
            $table->string('stock_product_package');
            $table->string('stock_product_qty');
            $table->integer('stock_product_number_of_revisioin');
            
            
            $table->timestamps();

            $table->foreign('stock_product_id')->references('product_id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stock');
    }
}
