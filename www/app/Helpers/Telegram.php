<?php
namespace App\Helpers;

 use \Illuminate\Support\Facades\Http;
 use Illuminate\Support\Facades\Storage;

 class Telegram {
    protected $http;
    const url = 'http://api.tlgr.org/bot';
    protected $bot;
    public function __construct(Http $http, $bot)
    {
        $this->http = $http;
        $this->bot = $bot;
    }

    public function sendMessage($chatID, $message) {
        return $this->http::post(self::url.$this->bot.'/sendMessage', [
            'chat_id' => $chatID,
            'text' => $message,
            'parse_mode' => "html"
        ]);
    }

    /**
     * @return mixed
     */
    public function sendDocument($chatID, $file) {
        return $this->http::attach('document', $file, 'document.png')
            ->post(self::url.$this->bot.'/sendDocument', [
                'chat_id' => $chatID,
            ]);
    }

    public function sendSurvey($chatID, $message, $buttons) {
        return $this->http::post(self::url.$this->bot.'/sendMessage', [
            'chat_id' => $chatID,
            'text' => $message,
            'parse_mode' => "html",
            'reply_markup' => $buttons
        ]);
    }





}
