<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateRooms extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rooms', function (Blueprint $table) {
            $table->string('drink_water', 50)->nullable()->change();
            $table->string('parking', 50)->nullable()->change();
            $table->string('shared_kitchen', 50)->nullable()->change();
            $table->string('shared_bathroom', 50)->nullable()->change();
            $table->string('bill_included', 50)->nullable()->change();
            $table->string('wifi', 50)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rooms', function (Blueprint $table) {
            //
        });
    }
}
