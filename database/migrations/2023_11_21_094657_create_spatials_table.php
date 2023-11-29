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
        Schema::create('spatials', function (Blueprint $table) {
            $table->id('sp_id');
            $table->unsignedBigInteger('group_id'); 
            $table->foreign('group_id')->references('group_id')->on('spatial__groups');
            $table->string('title', 45);
            $table->string('name', 45);
            $table->string('url', 100);
            $table->string('attribute', 100); 
            $table->text('description');
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
        Schema::dropIfExists('spatials');
    }
};
