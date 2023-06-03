<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_languages', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('message_place_id')->unsigned();
            $table->string('language');
            $table->foreign('message_place_id')->references('id')->on('massage_places');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('service_languages');
    }
};
