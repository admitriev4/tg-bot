<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddServeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('serveys')->insert([
            'question' => 'Как тебя зовут?',
            'picture' => 'public/3k6m0v7KbzvMNpkkpQc5lFkLg7JB6SKzCZGKYbpY.jpg',
            'active' =>"Y",
            'active_from' => date("Y-m-d H:i:s"),
            'active_to' => null,
        ]);
        DB::table('serveys')->insert([
            'question' => 'Сколько тебе лет?',
            'picture' => 'public/3k6m0v7KbzvMNpkkpQc5lFkLg7JB6SKzCZGKYbpY.jpg',
            'active' =>"Y",
            'active_from' => date("Y-m-d H:i:s"),
            'active_to' => null,
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('serveys')->where('question', '=', 'Как тебя зовут?')->delete();
        DB::table('serveys')->where('question', '=', 'Сколько тебе лет?')->delete();
    }
}
