<?php

namespace App\Http\Controllers\Api\Telegram;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Telegram\Bot\Laravel\Facades\Telegram;

class MainController extends Controller
{
    public function commandsHandler()
    {
        $updates = Telegram::getWebhookUpdates();
        $text = "Добро пожаловать в бот GreenSoftPro";

        Telegram::sendMessage([
            'chat_id' => $updates->message->from->id,
            'text' => $text,
            'parse_mode' => 'html'
        ]);

        $text = "Выберите категорию:".PHP_EOL;
        $keyboard = array(
            array(
               array('text'=>'Боты','callback_data'=>'bots'),
            ),
            array(
                array('text'=>'Запись','callback_data'=>'online'),
            )
        );

        Telegram::sendMessage([
            'chat_id' => $updates->message->from->id,
            'text' => $text,
            'parse_mode' => 'html',
            'disable_web_page_preview' => false,
            'reply_markup' => json_encode(array('inline_keyboard' => $keyboard))
        ]);

    }

    public function callbackHandler($callback)
    {
        Log::info("callback: ".$callback);
        $method = lcfirst($callback).'Callback';
        if (method_exists(new self, $method)) {
            (new self)->$method;
        }
    }

    public function botsCallback()
    {
        Log::info("Ok222");
        // $keyboard = array(
        //     array(
        //        array('text'=>'Боты','callback_data'=>'bots'),
        //     ),
        //     array(
        //         array('text'=>'Запись','callback_data'=>'online'),
        //     )
        // );

        // Telegram::sendMessage([
        //     'chat_id' => $updates->message->from->id,
        //     'text' => $text,
        //     'parse_mode' => 'html',
        //     'disable_web_page_preview' => false,
        //     'reply_markup' => json_encode(array('inline_keyboard' => $keyboard))
        // ]);
    }
}
