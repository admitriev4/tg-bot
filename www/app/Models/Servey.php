<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class Servey extends Model
{
    use HasFactory, Notifiable;
    public $id;
    public $question;
    public $picture;


    public function addServey(Request $request) {
        $active = ($request->active == "on") ? "Y" : "N";
        $picturePath = Storage::putFile('public', $request->picture);
        $req = DB::table('serveys')->insertGetId([
            'question' => $request->question,
            'picture' => $picturePath,
            'active' => $active,
            'active_from' => $request->active_from,
            'active_to' => $request->active_to,
        ]);
        return $req;
    }
    public function getList()
    {
        $serveys = DB::table('serveys')->get();
        return $serveys;
    }
    public function getServey($id) {

            $servey = DB::table('serveys')
                ->select('id', 'question','picture', 'active', 'active_from', 'active_to')
                ->where('id', '=', $id)
                ->get();
            return $servey->all()[0];

    }
    public function updateServey($request) {
        $active = ($request->active == "on") ? "Y" : "N";
        $picturePath = Storage::putFile('public', $request->picture);
        $req = DB::table('serveys')->where('id', "=" , $request->id)->update([
            'question' => $request->question,
            'picture' => $picturePath,
            'active' => $active,
            'active_from' => $request->active_from,
            'active_to' => $request->active_to,
        ]);
        return $req;
    }
    public function deleteServey($id) {
        DB::table('serveys')->where('id', '=', $id)->delete();
    }
}
