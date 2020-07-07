<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAutoPartImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auto_part_images', function (Blueprint $table) {
            $table->id();
            $table->string('url');
            $table->bigInteger('auto_part_id')->unsigned();
            $table->timestamps();

            $table->foreign('auto_part_id')->references('id')
                ->on('auto_parts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('auto_part_images');
    }
}
