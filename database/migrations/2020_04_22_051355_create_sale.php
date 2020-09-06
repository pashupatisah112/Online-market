<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSale extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sale', function (Blueprint $table) {
            $table->id();
            $table->integer('city_id');
            $table->integer('user_id');
            $table->integer('product_desc');
            $table->integer('locaton');
            $table->timestamp('start_date')->nullable();
            $table->timestamp('end_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sale');
    }
}
