<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->foreignId('traveler_id');
            $table->foreign('traveler_id')->references('id')->on('users');
            $table->foreignId('resto_id');
            $table->foreign('resto_id')->references('id')->on('restaurants');
            $table->datetime('date')->nullable();
            $table->index(['traveler_id','resto_id','date']);
            $table->integer('amount')->nullable();
            $table->integer('status')->default(1);
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
        Schema::dropIfExists('bookings');
    }
}
