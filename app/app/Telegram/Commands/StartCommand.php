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
        $keyboard = Keyboard::make()
            ->button(
                ['text' => 'Test', 'callback_data' => 'data'],
                ['text' => 'Btn2', 'callback_data' => 'data_from_btn2']
            );

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
