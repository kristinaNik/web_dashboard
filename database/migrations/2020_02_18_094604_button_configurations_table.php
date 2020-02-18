<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ButtonConfigurationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('button_configurations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->text('link');
            $table->unsignedBigInteger('color_id');
            $table->integer('button_id');
            $table->foreign('color_id')->references('id')->on('button_colors');
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
        Schema::dropIfExists('button_configurations');
    }
}
