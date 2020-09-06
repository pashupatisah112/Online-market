<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('type');
            $table->string('flat_type')->nullable();
            $table->string('floor')->nullable();
            $table->integer('num_rooms');
            $table->string('suitable_for');
            $table->integer('rent');
            $table->string('ad_duration');
            $table->text('image');
            $table->string('description',500)->nullable()->default('No description');
            $table->string('drink_water')->default('No');
            $table->string('parking')->default('No');
            $table->string('shared_kitchen')->default('No');
            $table->string('shared_bathroom')->default('No');
            $table->string('bill_included')->default('No');
            $table->string('wifi')->default('No');
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
        Schema::dropIfExists('rooms');
    }
}
