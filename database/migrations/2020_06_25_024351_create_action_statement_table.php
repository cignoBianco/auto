<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActionStatementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('action_statement', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('action_id')->unsigned();
            $table->float('points')->nullable();
            $table->unsignedMediumInteger('amount_count')->nullable();
            $table->string('statement')->nullable();
            $table->timestamps();

            $table->foreign('action_id')->references('id')
                ->on('actions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('action_statement');
    }
}
