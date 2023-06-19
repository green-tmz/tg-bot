<?php

namespace App\Telegram\Commands;

use Telegram\Bot\Commands\Command;

class StartCommand extends Command
{
    protected string $name = 'start';
    protected string $description = 'Основное меню';

    public function handle()
    {
        $category = json_encode([
            'inline_keyboard' => [
                [
                    [
                        'text' => 'Button 1',
                        'callback_data' => 'test_1',
                    ]
                ],
                [
                    [
                        'text' => 'Button 2',
                        'callback_data' => 'test_2',
                    ],
                ],
            ]
        ]);


        $text = "Добро пожаловать в бот GreenSoftPro".PHP_EOL.PHP_EOL;
        $text .= "Выберите категорию:".PHP_EOL;
        // $text .= "/about - Описание бота".PHP_EOL;
        // $text .= "/start - Основное меню".PHP_EOL;

        $this->replyWithMessage([
            'text' => $text,
            'parse_mode' => 'html',
            'reply_markup' => $category
        ]);
    }
}
