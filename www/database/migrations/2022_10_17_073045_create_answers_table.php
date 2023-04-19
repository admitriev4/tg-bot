<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answers', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('servey')->unsigned();
            $table->string('answer')->nullable(true);
            $table->string('name_user_tg');
            $table->string('chat_id');
            $table->text('passage_time')->nullable(true);
            $table->timestamp('date_question_asked', 0)->nullable(true);
            $table->timestamp('date_answer', 0)->nullable(true);
            $table->string('question_asked', 1);
            $table->string('answer_get', 1);


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('answers');
    }
}
