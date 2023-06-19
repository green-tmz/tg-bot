<?php

namespace App\Telegram\Commands;

use App\Http\Controllers\Api\Telegram\MainController;
use Telegram\Bot\Commands\Command;

class StartCommand extends Command
{
    protected string $name = 'start';
    protected string $description = 'Основное меню';

    public function handle()
    {
        MainController::commandsHandler();
    }
}
