<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurants', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('name')->nullable();
            $table->string('password');
            $table->string('address')->nullable();
            $table->string('description')->nullable();
            $table->integer('pricerate')->nullable();
            $table->date('opendate')->nullable();
            $table->double('rate')->nullable();
            $table->string('XYcoor')->nullable();
            // $table->string('location')->nullable();
            $table->string('timeservice')->nullable();
            $table->string('code')->nullable();  
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('restaurants');
    }
}
