<?php

namespace App\Http\Controllers\Api\Telegram;

use App\Http\Controllers\Controller;
use Telegram\Bot\Keyboard\Keyboard;
use Telegram\Bot\Laravel\Facades\Telegram;

class MainController extends Controller
{
    public static function commandsHandler()
    {
        $updates = Telegram::getWebhookUpdates();
        $firstButton = Keyboard::inlineButton(['text' => 'Test', 'callback_data' => 'data']);
        $secondButton = Keyboard::inlineButton(['text' => 'Btn 2', 'callback_data' => 'data_from_btn2']);

        $keyboard = Telegram::replyKeyboardMarkup([])->inline()
            ->row($firstButton)
            ->row($secondButton);

        $text = "Добро пожаловать в бот GreenSoftPro".PHP_EOL.PHP_EOL;
        $text .= "Выберите категорию:".PHP_EOL;
        // $text .= "/about - Описание бота".PHP_EOL;
        // $text .= "/start - Основное меню".PHP_EOL;

        Telegram::sendMessage([
            'text' => $text,
            'parse_mode' => 'html',
            'reply_markup' => $keyboard
        ]);
    }
}
