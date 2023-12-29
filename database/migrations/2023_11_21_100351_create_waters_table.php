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
        Schema::create('waters', function (Blueprint $table) {
            $table->id('water_id');
            $table->unsignedBigInteger('regency_id'); 
            $table->foreign('regency_id')->references('regency_id')->on('regencies');
            $table->string('lu_id',100); 
            $table->unsignedBigInteger('lc_id'); 
            $table->foreign('lc_id')->references('lc_id')->on('land_covers');
            $table->unsignedBigInteger('group_id'); 
            $table->foreign('group_id')->references('group_id')->on('spatial__groups');
            $table->string('name', 45);
            $table->string('latitude', 45);
            $table->string('longitude', 45);
            $table->string('altitude', 45);
            $table->string('address');
            $table->string('wide', 45);
            $table->text('aoi');
            $table->set('status_area', ['private', 'public']);
            $table->string('ownership', 45);
            $table->string('photo', 100);
            $table->string('permanence', 100);
            $table->text('description');
            $table->text('related_photo');
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
        Schema::dropIfExists('waters');
    }
};
