<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAutoProductImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auto_product_images', function (Blueprint $table) {
            $table->id();
            $table->string('url');
            $table->bigInteger('auto_product_id')->unsigned();
            $table->timestamps();

            $table->foreign('auto_product_id')->references('id')
                ->on('auto_products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('auto_product_images');
    }
}
