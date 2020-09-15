<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeedbacksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feedbacks', function (Blueprint $table) {
            $table->foreignId('traveler_id');
            $table->foreign('traveler_id')->references('id')->on('users');
            $table->foreignId('resto_id');
            $table->foreign('resto_id')->references('id')->on('restaurants');
            $table->date('date');
            $table->index(['traveler_id','resto_id','date']);
            $table->double('rate')->nullable();
            $table->string('feedback')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('feedbacks');
    }
}
