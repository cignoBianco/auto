<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('specifications')->nullable();
            $table->bigInteger('section_id')->unsigned();
            
            $table->unsignedTinyInteger('priority')->nullable();
            $table->boolean('show')->default(1);
            $table->string('main_picture')->nullable();

            $table->string('seo_url')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();

            $table->timestamps();

            $table->foreign('section_id')->references('id')
                ->on('sections');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
