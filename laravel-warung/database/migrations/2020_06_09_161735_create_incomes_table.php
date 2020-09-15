<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncomesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incomes', function (Blueprint $table) {
            $table->foreignId('resto_id');
            $table->foreign('resto_id')->references('id')->on('restaurants');
            $table->date('added_on')->unique();
            $table->index(['resto_id','added_on']);
            $table->double('income')->nullable();
            $table->integer('transactions')->nullable(); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('incomes');
    }
}
