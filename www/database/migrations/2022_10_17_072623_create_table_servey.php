<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableServey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('serveys', function (Blueprint $table) {
            $table->id();
            $table->string('question');
            $table->string('picture');
            $table->string('active');
            $table->timestamp('active_from')->nullable(true);
            $table->timestamp('active_to')->nullable(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('serveys');
    }
}
