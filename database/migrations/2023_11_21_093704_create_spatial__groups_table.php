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
        Schema::create('spatial__groups', function (Blueprint $table) {
            $table->id('group_id');
            $table->unsignedBigInteger('regency_id'); // Add this line to create the 'regency_id' column
            $table->foreign('regency_id')->references('regency_id')->on('regencies');
            $table->string('name', 45);
            $table->set('active', ['1', '0']);
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
        Schema::dropIfExists('spatial__groups');
    }
};
