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
        Schema::create('massage_places', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('area');
            $table->string('address');
            $table->string('rate')->nullable();
            $table->string('service');
            $table->text('review_content');
            $table->string('phone_number');
            $table->string('advantage')->nullable();
            $table->integer('status')->default(1);
            $table->bigInteger('max_price')->nullable();
            $table->bigInteger('min_price')->nullable();
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
        Schema::dropIfExists('massage_places');
    }
};