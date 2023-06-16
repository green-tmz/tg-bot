<?php

namespace App\Telegram\Commands;

use Telegram\Bot\Commands\Command;
use App\Http\Controllers\Api\Telegram\MainController;

class StartCommand extends Command
{
    protected string $name = 'start';
    protected string $description = 'Основное меню';

    public function handle()
    {
        MainController::commandsHandler();
    }
}
