<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('product_id');
            $table->string('product_name');
            $table->timestamp('product_created_date');
            $table->timestamp('product_updated_date')->nullable();
            $table->integer('product_created_by');
            $table->integer('product_updated_by');
            $table->longText('product_description')->nullable();
            $table->integer('product_status');                                                                                                                                                                                                                                                                                   
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
