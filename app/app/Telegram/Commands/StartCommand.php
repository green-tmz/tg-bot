<?php

namespace App\Telegram\Commands;

use Telegram\Bot\Commands\Command;

class StartCommand extends Command
{
    protected string $name = 'start';
    protected string $description = 'Основное меню';

    public function handle()
    {
        $text = "Добро пожаловать в бот GreenSoftPro".PHP_EOL;
        $text .= "Выберите категорию:".PHP_EOL;
        // $text .= "/about - Описание бота".PHP_EOL;
        // $text .= "/start - Основное меню".PHP_EOL;

        // Telegram::sendMessage([
        //     'chat_id' => $updates->message->from->id,
        //     'text' => $text,
        //     'parse_mode' => 'html'
        // ]);
    }
}
