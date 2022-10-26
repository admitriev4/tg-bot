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

    public function addServey(Request $request) {
        $active = ($request->active == "on") ? "Y" : "N";
        $active_from = $request->time_active;
        $active_to = $request->time_active;
        $picturePath = Storage::putFile('public', $request->picture);
        $req = DB::table('serveys')->insert([
            'question' => $request->question,
            'picture' => $picturePath,
            'active' => $active,
            'active_from' => $active_from,
            'active_to' => $active_to,
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
                ->select('id', 'question','picture', 'active', 'time_active')
                ->where('id', '=', $id)
                ->get();
            return $servey;

    }
    public function updateServey($request) {
        $active = ($request->active == "on") ? "Y" : "N";
        $picturePath = Storage::putFile('public', $request->picture);
        $req = DB::table('serveys')->where('id', "=" , $request->id)->update([
            'question' => $request->question,
            'picture' => $picturePath,
            'active' => $active,
            'time_active' => $request->time_active,
        ]);
        return $req;
    }
    public function deleteServey($id) {
        DB::table('serveys')->where('id', '=', $id)->delete();
    }
}
