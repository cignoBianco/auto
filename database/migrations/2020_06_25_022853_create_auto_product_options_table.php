<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAutoProductOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auto_product_options', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('auto_product_id')->unsigned();
            $table->bigInteger('option_id')->unsigned();
            $table->timestamps();

            $table->foreign('auto_product_id')->references('id')
                ->on('auto_products');
            $table->foreign('option_id')->references('id')
                ->on('options');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('auto_product_options');
    }
}
