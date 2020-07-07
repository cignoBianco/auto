<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            $table->boolean('product_or_part')->default(0);
            $table->string('product_or_part_id');
            $table->integer('amount')->unsigned()->default(1);
            $table->bigInteger('user_id')->unsigned();
            $table->string('delivery')->nullable();
            $table->float('sum')->nullable();
            $table->bigInteger('status_id')->unsigned();

            $table->timestamps();

            $table->foreign('user_id')->references('id')
                ->on('users');
            $table->foreign('status_id')->references('id')
                ->on('statuses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
