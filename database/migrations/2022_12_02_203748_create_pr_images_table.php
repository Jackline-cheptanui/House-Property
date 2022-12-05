<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrImagesTable extends Migration
{
    /**
     * Run the migrations.
     *sdfvkllgk
     * @return void
     */
    public function up()
    {
        Schema::create('pr_images', function (Blueprint $table) {
            $table->id();
            $table->integer('property_id');
            $table->integer('property_room_id');
            $table->string('property_image')->nullable();
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
        Schema::dropIfExists('pr_images');
    }
}
