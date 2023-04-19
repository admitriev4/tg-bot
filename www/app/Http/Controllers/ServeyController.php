<?php

namespace App\Http\Controllers;

use App\Models\Servey;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use DateTime;

class ServeyController extends Controller
{
    public function index() {
        $model = new Servey();
        $serveys = $model->getList();
        $this->getListServey();
        return view('bot.serveys', [
            'title' => "Список пользователей",
            'serveys' => $serveys
        ]);
    }

    public function serveyAdd(Request $request) {
        $model = new Servey();
        $id = $model->addServey($request);
        return Redirect::to('/serveys/');
    }

    public function serveyUpdate(Request $request) {
        $model = new Servey();
        $model->updateServey($request);
        return Redirect::to('/serveys/');
    }
    public function serveyDelete(Request $request) {
        $model = new Servey();
        $model->deleteServey($request->id);
        return Redirect::to('/serveys/');
    }


    public function getListServey() {
        $model = new Servey();
        $serveys = $model->getList();
        $req = array();
        foreach ($serveys as $servey) {
            if($servey->active_to != null) {
                $date_from = new DateTime($servey->active_from);
                $date_to = new DateTime($servey->active_to);
                $date_now = new DateTime();
                if($date_from <= $date_now && $date_now <= $date_to) {
                    $req["servey_id_".$servey->id] =  $servey->question;
                }
            } else {
                $req["servey_id_".$servey->id] =  $servey->question;
            }

        }
        return $req;
    }
    public function getServey($id) {
        $model = new Servey();
        $servey = $model->getServey($id);
        return $servey;



    }
 }
