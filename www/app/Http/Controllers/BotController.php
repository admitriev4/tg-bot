<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\Telegram;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class BotController extends Controller
{
    protected $chat_id = '966505653';
    protected $telegram;
    public function __construct()
    {
        $this->telegram = new Telegram(new Http(), config('bots.bot'));
    }

    public function sendMessage(Request $request) {
       return $this->telegram->sendMessage($this->chat_id, $request->message);

    }
    public function sendDocument(Request $request) {
        $file = Storage::disk('public')->get('1.png');
        return $this->telegram->sendDocument($this->chat_id, $file);
    }
    public function sendSurvey(Request $request) {
        $message="Проверка кнопок";
        $buttons = [
            'inline_keyboard' => [
                [
                    [
                        'text' => 'button1',
                        'callback_data' => '1'
                    ],
                    [
                        'text' => 'button2',
                        'callback_data' => '2'
                    ]
                ]
            ]
        ];

        return $this->telegram->sendSurvey($this->chat_id, $message, $buttons);
    }


}
