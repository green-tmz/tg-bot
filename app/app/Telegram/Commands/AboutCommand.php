<?php

namespace App\Telegram\Commands;

use Telegram\Bot\Commands\Command;
use App\Http\Controllers\Api\Telegram\MainController;

/**
 * Class HelpCommand.
 */
class AboutCommand extends Command
{
    /**
     * @var string Command Name
     */
    protected string $name = 'about';

   /**
     * @var string Command Description
     */
    protected string $description = 'About bot';

    /**
     * {@inheritdoc}
     */
    public function handle()
    {
        MainController::commandsHandler();
    }
}
