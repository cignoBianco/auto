<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAutoPartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auto_parts', function (Blueprint $table) {
            $table->id();

            $table->string('article');
            $table->bigInteger('number');
            $table->bigInteger('category_id')->unsigned();
            $table->string('producer')->nullable();
            $table->string('priority')->nullable();
            $table->bigInteger('status_id')->unsigned();
            $table->bigInteger('provider_id')->unsigned();
            $table->text('description')->nullable();
            $table->string('applicability')->default(0);
            $table->string('main_picture')->nullable();
            $table->string('specifications')->nullable();
            $table->float('price')->default(0);
            $table->float('producer_price')->default(0);
            $table->boolean('available')->default(0);

            $table->string('seo_url')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();

            $table->timestamps();

            $table->foreign('category_id')->references('id')
                ->on('categories');
            $table->foreign('provider_id')->references('id')
                ->on('providers');
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
        Schema::dropIfExists('auto_parts');
    }
}
