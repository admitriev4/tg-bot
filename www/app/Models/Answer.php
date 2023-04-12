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
            'date_answer' => $request->date_answer,
        ]);
        return $req;
    }
    public function getList()
    {
        $serveys = DB::table('answers')->get();
        return $serveys;
    }
    public function getAnswer($id) {

        $servey = DB::table('answers')
            ->select('id', 'servey', 'answer', 'name_user_tg', 'chat_id', 'passage_time', 'date_answer')
            ->where('id', '=', $id)
            ->get();
        return $servey;

    }

    public function deleteAnswer($id) {
        DB::table('answers')->where('id', '=', $id)->delete();
    }
}
