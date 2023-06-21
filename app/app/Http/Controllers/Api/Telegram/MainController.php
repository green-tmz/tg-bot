<?php

namespace App\Http\Controllers\Api\Telegram;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Telegram\Bot\Laravel\Facades\Telegram;

class MainController extends Controller
{
    public $updates;

    public function __construct()
    {
        $this->updates = Telegram::getWebhookUpdates();
    }

    public function commandsHandler()
    {
        $text = "Добро пожаловать в бот GreenSoftPro";

        Telegram::sendMessage([
            'chat_id' => $this->updates->message->from->id,
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
            'chat_id' => $this->updates->message->from->id,
            'text' => $text,
            'parse_mode' => 'html',
            'reply_markup' => json_encode(array('inline_keyboard' => $keyboard))
        ]);

    }

    public function callbackHandler($callback)
    {
        $method = lcfirst($callback->data).'Callback';

        if (method_exists(new self, $method)) {
            call_user_func_array([$this, $method], [$callback]);
        }
    }

    public function botsCallback($updates)
    {
        $text = "<b>Выберите месенджер:</b>".PHP_EOL;
        $keyboard = array(
            array(
               array('text'=>'Телеграм','callback_data'=>'tg'),
            ),
            array(
                array('text'=>'Whatsapp','callback_data'=>'wa'),
            ),
            array(
                array('text'=>'Назад','callback_data'=>'backToMain'),
            )
        );

        Telegram::editMessageText([
            'chat_id' => $updates['from']['id'],
            'message_id' => $updates['message']['message_id'],
            'text' => $text,
            'parse_mode' => 'html',
            'reply_markup' => json_encode(array('inline_keyboard' => $keyboard))
        ]);
    }

    public function backToMainCallback($updates)
    {
        $text = "Выберите категорию:".PHP_EOL;
        $keyboard = array(
            array(
               array('text'=>'Боты','callback_data'=>'bots'),
            ),
            array(
                array('text'=>'Запись','callback_data'=>'online'),
            )
        );

        Telegram::editMessageText([
            'chat_id' => $updates['from']['id'],
            'message_id' => $updates['message']['message_id'],
            'text' => $text,
            'parse_mode' => 'html',
            'reply_markup' => json_encode(array('inline_keyboard' => $keyboard))
        ]);
    }

    public function tgCallback($updates)
    {
        $text = "<b>Выберите бота:</b>".PHP_EOL;
        $keyboard = array(
            array(
               array('text'=>'Радио','url'=>'https://t.me/gs_radio_bot'),
            ),
            array(
                array('text'=>'Онлайн запись','url'=>'https://t.me/gs_online_bot'),
            ),
            array(
                array('text'=>'Назад','callback_data'=>'bots'),
            )
        );

        Telegram::editMessageText([
            'chat_id' => $updates['from']['id'],
            'message_id' => $updates['message']['message_id'],
            'text' => $text,
            'parse_mode' => 'html',
            'reply_markup' => json_encode(array('inline_keyboard' => $keyboard))
        ]);
    }

    public function setName()
    {
        Telegram::setMyName([
            'name' => 'Test',
        ]);
    }
}
