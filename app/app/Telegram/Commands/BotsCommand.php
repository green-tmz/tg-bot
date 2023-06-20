<?php

namespace App\Telegram\Commands;

use Telegram\Bot\Commands\Command;
use Illuminate\Support\Facades\Log;

/**
 * Class HelpCommand.
 */
class BotsCommand extends Command
{
    /**
     * @var string Command Name
     */
    protected string $name = 'bots';

    /**
     * @var string Command Description
     */
    protected string $description = 'Список ботов';

    /**
     * {@inheritdoc}
     */
    public function handle()

    {
        $text = "<b>Список ботов:</b>".PHP_EOL;

        Log::info("Bots222");
        $this->replyWithMessage([
            'text' => $text,
            'parse_mode' => 'html'
        ]);

    }
}
