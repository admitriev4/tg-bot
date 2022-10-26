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
            'answer' => $request->answer,
            'name_user_tg' => $request->answer,
            'chat_id' => $request->answer,
            'passage_time' => $request->answer,
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
            ->select('id', 'answer','name_user_tg', 'chat_id', 'passage_time', 'create_at')
            ->where('id', '=', $id)
            ->get();
        return $servey;

    }

    public function deleteAnswer($id) {
        DB::table('answers')->where('id', '=', $id)->delete();
    }
}
