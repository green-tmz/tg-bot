<?php

namespace App\Telegram\Commands;

use Telegram\Bot\Commands\Command;
use Telegram\Bot\Keyboard\Keyboard;

class StartCommand extends Command
{
    protected string $name = 'start';
    protected string $description = 'Основное меню';

    public function handle()
    {
        $firstButton = Keyboard::inlineButton(['text' => 'Test', 'callback_data' => 'data']);
        $secondButton = Keyboard::inlineButton(['text' => 'Btn 2', 'callback_data' => 'data_from_btn2']);

        $keyboard = $this->replyKeyboardMarkup([])->inline()
            ->row($firstButton)
            ->row($secondButton);

        $text = "Добро пожаловать в бот GreenSoftPro".PHP_EOL.PHP_EOL;
        $text .= "Выберите категорию:".PHP_EOL;
        // $text .= "/about - Описание бота".PHP_EOL;
        // $text .= "/start - Основное меню".PHP_EOL;

        $this->replyWithMessage([
            'text' => $text,
            'parse_mode' => 'html',
            'reply_markup' => $keyboard
        ]);
    }
}
