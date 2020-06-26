<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banners', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedTinyInteger('type')->default(0);
            $table->string('sort_order')->nullable();
            $table->string('url')->nullable();
            $table->string('picture')->nullable();
            $table->boolean('is_active')->default(0);
            $table->unsignedMediumInteger('show_amount')->default(0);
            $table->float('period_between_show')->nullable();
            $table->float('show_time')->nullable();
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
        Schema::dropIfExists('banners');
    }
}
