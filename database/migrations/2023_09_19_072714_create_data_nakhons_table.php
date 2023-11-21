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
        Schema::create('data_nakhons', function (Blueprint $table) {
            $table->id();
            $table->string('PrjectCode');
            $table->string('latitude');
            $table->string('longitude');
            $table->string('no_village');
            $table->string('subdistrict');
            $table->string('district');
            $table->string('project_code');
            $table->string('owner');
            $table->string('number');
            $table->string('distance');
            $table->string('picture');
            $table->string('yes');
            $table->string('no');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_nakhons');
    }
};
