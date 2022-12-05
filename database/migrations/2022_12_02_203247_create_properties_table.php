<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    //property_description
    //property_name
    //property_location
    //
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $$tabel->string('property_description')->nullable();
            $table->string('property_name')->nullable();
            $table->string('property_location')->nullable();
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
        Schema::dropIfExists('properties');
    }
}
