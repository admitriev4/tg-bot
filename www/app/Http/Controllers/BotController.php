<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\Telegram;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\ServeyController;

class BotController extends Controller
{
    protected $telegram;
    protected $ServeyController;
    public function __construct()
    {
        $this->telegram = new Telegram(new Http(), config('bots.bot'));
        $this->ServeyController = new ServeyController();
    }
    public function  setWebhook () {
        $url = 'https://' . \request()->getHost() . '/webhook';
        return $this->telegram->setWebhook($url);
    }

    public function  getWebhook () {
        return $this->telegram->getWebhookUpdates();
    }

    public function  webhook (Request $request) {
//        Log::debug("___________________________________________________________");
//        Log::debug("___________________________________________________________");
//        Log::debug($request->all());
//        Log::debug("___________________________________________________________");
//        if(!empty($request->input('message'))) {
//            Log::debug('1');
//            if($request->input('message')['text'] == "/start") {
//                $buttons = $this->ServeyController->getListServey();
//                $this->telegram->sendSurvey($request->input('message')['from']['id'], 'Выберите опрос', $buttons);
//            }
//        } else {
//            $req = $request->input('callback_query');
//            /*if (strpos($req['data'], "servey_id_") === false) {
//                //Log::debug("Строка  не найдена в строке");
//            } else {
//                $id = explode('_', $req['data'])[2];
//                $servey = $this->ServeyController->getServey($id);
//                $picture = \request()->getHost() . Storage::url($servey->picture);
//                $r = $this->telegram->sendPhoto($req['from']['id'], $picture, $servey->question);
//                //Log::debug($r);
//            }*/
//            Log::debug('2');
//
//        }
//
//        Log::debug("___________________________________________________________");
//        Log::debug("___________________________________________________________");

    }



}
