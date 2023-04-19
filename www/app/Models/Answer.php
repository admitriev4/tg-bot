<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class Answer extends Model
{
    use HasFactory, Notifiable;
    public function addAnswer(Request $request) {
        $req = DB::table('answers')->insert([
            'servey' => $request->servey,
            'answer' => $request->answer,
            'name_user_tg' => $request->name_user_tg,
            'chat_id' => $request->chat_id,
            'passage_time' => $request->passage_time,
            'date_question_asked' => $request->date_question_asked,
            'date_answer' => $request->date_answer,
            'question_asked' => $request->question_asked,
            'answer_get' => $request->answer_get
        ]);
        return $req;
    }

    public function updateAnswer(Request $request) {

        $req = DB::table('answers')->where('id', "=" , $request->id)->update([
            'servey' => $request->servey,
            'answer' => $request->answer,
            'name_user_tg' => $request->name_user_tg,
            'chat_id' => $request->chat_id,
            'passage_time' => $request->passage_time,
            'date_question_asked' => $request->date_question_asked,
            'date_answer' => $request->date_answer,
            'question_asked' => $request->question_asked,
            'answer_get' => $request->answer_get
        ]);
        return $req;
    }

    public function getList()
    {
        $answers = DB::table('answers')->get();
        return $answers;
    }
    public function getAnswer($id) {

        $answers = DB::table('answers')
            ->select('id', 'servey', 'answer', 'name_user_tg', 'chat_id', 'passage_time', 'date_question_asked', 'date_answer', 'question_asked', 'answer_get')
            ->where('id', '=', $id)
            ->get();
        return $answers;

    }


    public function searchAnswer($chat_id) {

        $answer = DB::table('answers')
            ->select('id', 'servey', 'answer', 'name_user_tg', 'chat_id', 'passage_time', 'date_question_asked', 'date_answer', 'question_asked', 'answer_get')
            ->where('chat_id', '=', $chat_id)
            ->where('question_asked', '=', "Y")
            ->where('answer_get', '=', "N")
            ->orderBy('date_question_asked', 'desc')
            ->first();
        return $answer;

    }

    public function deleteAnswer($id) {
        DB::table('answers')->where('id', '=', $id)->delete();
    }
}
