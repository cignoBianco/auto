<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActionsProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actions_products', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('action_id')->unsigned();
            $table->boolean('product_or_part')->default(0);
            $table->string('product_or_part_id');
            $table->timestamps();

            $table->foreign('action_id')->references('id')
                ->on('actions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('actions_products');
    }
}
