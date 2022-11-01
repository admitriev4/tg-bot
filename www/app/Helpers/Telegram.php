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
    public function sendPhoto($chatID, $file, $caption) {
        return $this->http::post(self::url.$this->bot.'/sendPhoto', [
            'chat_id' => $chatID,
            'photo' => $file,
            'caption' => $caption,
            'parse_mode' => "html"
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

     public function setWebhook($url) {
         return $this->http::get(self::url.$this->bot.'/setWebhook?url='.$url);
     }

     public function getWebhookUpdates() {
         return $this->http::get(self::url.$this->bot.'/getWebhookInfo');
     }





}
