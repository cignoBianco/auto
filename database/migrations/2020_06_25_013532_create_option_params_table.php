<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOptionParamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('option_params', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('option_id')->unsigned();
            $table->bigInteger('param_id')->unsigned();
            $table->float('add_price')->default(0);
            $table->timestamps();

            $table->foreign('option_id')->references('id')
                ->on('options')->onDelete('cascade');
            $table->foreign('param_id')->references('id')
                ->on('parameters')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('option_params');
    }
}
