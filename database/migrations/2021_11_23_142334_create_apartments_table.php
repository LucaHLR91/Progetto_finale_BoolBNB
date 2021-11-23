<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apartments', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->smallInteger('beds');
            $table->smallInteger('rooms');
            $table->smallInteger('bathrooms');
            $table->smallInteger('square_meters');
            $table->string('image');
            $table->tinyInteger('avaliability');
            $table->string('city');
            $table->string('latitude');
            $table->string('longitude');
            $table->string('slug')->unique();
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
        Schema::dropIfExists('apartments');
    }
}
