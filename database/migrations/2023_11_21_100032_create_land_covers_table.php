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
        Schema::create('land_covers', function (Blueprint $table) {
            $table->id('lc_id');
            $table->set('type', ['agriculture', 'water', 'building', 'forest']);
            $table->string('landcover', 45);
            $table->string('icon', 45);
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
        Schema::dropIfExists('land_covers');
    }
};
