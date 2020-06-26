<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAutoPartOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auto_part_options', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('auto_part_id')->unsigned();
            $table->bigInteger('option_id')->unsigned();
            $table->timestamps();

            $table->foreign('auto_part_id')->references('id')
                ->on('auto_parts');
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
        Schema::dropIfExists('auto_part_options');
    }
}
