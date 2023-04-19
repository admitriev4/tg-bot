<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use Illuminate\Http\Request;
use App\Helpers\Telegram;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\ServeyController;
use Nette\Utils\Helpers;
use DateTime;


class BotController extends Controller
{
    protected Telegram $telegram;
    protected Controller $ServeyController;
    protected Answer $answer;
    public function __construct()
    {
        $this->telegram = new Telegram(new Http(), config('bots.bot'));
        $this->ServeyController = new ServeyController();
        $this->answer = new Answer();
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
                $this->telegram->sendButton($request->input('message')['from']['id'], 'Выберите необходимое действие:', $this->prepareButton('Получить список опросов', 'getServeys'));
            } elseif ($request->input('message')['text'] == "/close") {
                $this->telegram->sendMessage($request->input('message')['from']['id'], 'Если вы хотите выйти, то просто очистите историю сообщений или удалите чат');
            } else {
                $answer = $this->answer->searchAnswer($request->input('message')['from']['id']);
                if($answer) {
                    $date_answer = date('Y-m-d-H-i-s');
                    $date1 = new DateTime($answer->date_question_asked);
                    $date2 = new DateTime();
                    $passage_time = $date1->diff($date2);
                    $requestAnswer = new Request();
                    $requestAnswer->merge([
                        'id' => $answer->id,
                        'servey' => $answer->servey,
                        'answer' => $request->input('message')['text'],
                        'name_user_tg' => $answer->name_user_tg,
                        'chat_id' => $answer->chat_id,
                        'passage_time' => serialize($passage_time),
                        'date_question_asked' => $answer->date_question_asked,
                        'date_answer' => $date_answer,
                        'question_asked' => $answer->question_asked,
                        'answer_get' => "Y"
                    ]);
                    $rs = $this->answer->updateAnswer($requestAnswer);
                    if($rs) {
                        $this->telegram->sendButton($request->input('message')['from']['id'], 'Благодарим за ответ. Выберите дальнейщее действие:', $this->prepareButton('Получить список опросов', 'getServeys'));
                    }
                } else {
                    $this->telegram->sendMessage($request->input('message')['from']['id'], 'Такого опроса нет!');
                    Log::debug('Такого опроса нет');
                }
            }
        } else {
            $req = $request->input('callback_query');
            if (strpos($req['data'], "servey_id_") !== false) {
                $id = explode('_', $req['data'])[2];
                $servey = $this->ServeyController->getServey($id);
                $picture = \request()->getHost() . Storage::url($servey->picture);
                $this->telegram->sendPhoto($req['from']['id'], $picture, $servey->question);
                $requestAnswer = new Request();
                $requestAnswer->merge([
                    'servey'=>$servey->id,
                    'name_user_tg' => $req['from']['username'],
                    'chat_id' => $req['from']['id'],
                    'date_question_asked' => date('Y-m-d-H-i-s'),
                    'question_asked' => "Y",
                    'answer_get' => "N"
                ]);
                $this->answer->addAnswer($requestAnswer);
            } elseif ($req['data'] == "getServeys") {
                $buttons = $this->prepareArrButtons($this->ServeyController->getListServey());
                $this->telegram->sendSurvey($req['message']['chat']['id'], 'Выберите опрос', $buttons);
            }
        }
        /*Log::debug($request->all());*/
    }



}
