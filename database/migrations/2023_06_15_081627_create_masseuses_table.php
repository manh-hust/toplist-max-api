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
        Schema::create('masseuses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('massage_place_id')->constrained();
            $table->string('name');
            $table->integer('experience');
            $table->string('service')->nullable();
            $table->integer('age');
            $table->string('image');
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
        Schema::dropIfExists('masseuses');
    }
};
