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

    public function prepareButton($text, $callback_data) {

        $req = [
            'inline_keyboard' => [[[
                'text' => $text,
                'callback_data' => $callback_data
            ],
            ]]];
        return $req;
    }
    public function prepareArrButtons($arr) {
        $data = array();
        foreach ($arr as $key => $value) {
            $data[] = [[
                'text' => $value,
                'callback_data' => $key
            ],];
        }
        $req = ['inline_keyboard' => $data];
        return $req;
    }

    public function  webhook (Request $request) {

        if(!empty($request->input('message'))) {
            if($request->input('message')['text'] == "/start") {
                $this->telegram->sendButton($request->input('message')['from']['id'], '', $this->prepareButton('Получить список опросов', 'getServeys'));
            }
        } else {
            $req = $request->input('callback_query');
            if (strpos($req['data'], "servey_id_") !== false) {
                $id = explode('_', $req['data'])[2];
                $servey = $this->ServeyController->getServey($id);
                $picture = \request()->getHost() . Storage::url($servey->picture);
                $this->telegram->sendPhoto($req['from']['id'], $picture, $servey->question);
            } elseif ($req['data'] == "getServeys") {
                $buttons = $this->prepareArrButtons($this->ServeyController->getListServey());
                $this->telegram->sendSurvey($request->input('message')['from']['id'], 'Выберите опрос', $buttons);
            }
        }
        Log::debug($request->all());
    }



}
