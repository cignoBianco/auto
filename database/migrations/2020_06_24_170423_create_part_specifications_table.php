<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartSpecificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('part_specifications', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('part_id')->unsigned();
            $table->bigInteger('specification_id')->unsigned();
            $table->timestamps();

            $table->foreign('specification_id')->references('id')
                ->on('specifications');
            $table->foreign('part_id')->references('id')
                ->on('auto_parts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('part_specifications');
    }
}
