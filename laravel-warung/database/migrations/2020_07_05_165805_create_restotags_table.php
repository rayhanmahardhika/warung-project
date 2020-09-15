<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestotagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restotags', function (Blueprint $table) {
            $table->foreignId('resto_id');
            $table->foreign('resto_id')->references('id')->on('restaurants');
            $table->foreignId('tag_id');
            $table->foreign('tag_id')->references('id')->on('tags');
            $table->index(['resto_id', 'tag_id']);
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
        Schema::dropIfExists('restotags');
    }
}
