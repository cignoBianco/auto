<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAutoProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auto_products', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->bigInteger('category_id')->unsigned();
            $table->text('specifications')->nullable();

            $table->float('price')->default(0);
            $table->float('price_in_points')->default(0);
            $table->float('performer_price')->default(0);
            $table->float('points')->nullable();

            $table->string('main_picture')->nullable();
            $table->text('description')->nullable();

            $table->bigInteger('status_id')->unsigned();
            $table->boolean('available')->default(0);

            $table->string('seo_url')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();

            $table->timestamps();

            $table->foreign('category_id')->references('id')
                ->on('categories');
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
        Schema::dropIfExists('auto_products');
    }
}
