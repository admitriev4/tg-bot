<?php

namespace App\Http\Controllers;

use App\Models\Servey;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ServeyController extends Controller
{
    public function index() {
        $model = new Servey();
        $serveys = $model->getList();
        return view('bot.serveys', [
            'title' => "Список пользователей",
            'serveys' => $serveys
        ]);
    }

    public function serveyAdd(Request $request) {
        $model = new Servey();
        $id = $model->addServey($request);
        return Redirect::to('/servey/show/update/'.$id);
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
 }
