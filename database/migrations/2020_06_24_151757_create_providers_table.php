<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProvidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('providers', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('email')->unique();
            $table->text('description')->nullable();
            $table->unsignedTinyInteger('assessment')->default(0);
            $table->integer('orders_completed_at_time_amount')->unsigned()
                ->default(0);
            $table->integer('orders_not_completed_at_time_amount')->unsigned()
                ->default(0);
            $table->integer('orders_not_completed_amount')->unsigned()
                ->default(0);    

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
        Schema::dropIfExists('providers');
    }
}
