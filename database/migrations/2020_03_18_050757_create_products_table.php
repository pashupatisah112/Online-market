<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');
            $table->string('company');
            $table->string('condition');
            $table->string('used_time');
            $table->string('ad_duration');
            $table->string('negotiable');
            $table->integer('price');
            $table->string('delivery_service');
            $table->integer('delivery_charge')->nullable();
            $table->text('image');
            $table->string('description',500)->nullable()->default('No description');
            $table->integer('category_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->integer('city_id')->nullable();
            $table->integer('street_id')->nullable();
            $table->timestamps();
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
