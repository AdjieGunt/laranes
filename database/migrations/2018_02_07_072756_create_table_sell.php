<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableSell extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sell', function (Blueprint $table) {
            $table->increments('sell_id');                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  
            $table->timestamp('sell_created_date');
            $table->enum('sell_flag', ['IN', 'OUT']);
            $table->timestamp('sell_updated_date')->nullable();
            $table->integer('sell_created_by')->unsigned();                                                                                                
            $table->integer('sell_updated_by')->unsigned();

            $table->foreign('sell_created_by')->references('user_id')->on('users');
            $table->foreign('sell_updated_by')->references('user_id')->on('users');                                  

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sell');
    }
}
