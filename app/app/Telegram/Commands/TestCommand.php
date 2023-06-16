<?php

namespace App\Telegram\Commands;

use Telegram\Bot\Commands\Command;
use Illuminate\Support\Facades\Log;
use Telegram\Bot\Laravel\Facades\Telegram;

/**
 * Class HelpCommand.
 */
class TestCommand extends Command
{
    /**
     * @var string Command Name
     */
    protected string $name = 'test';

    /**
     * @var array Command Aliases
     */
    // protected array $aliases = ['listcommands123'];

    /**
     * @var string Command Description
     */
    protected string $description = 'Test command';

    /**
     * {@inheritdoc}
     */
    public function handle()
    {
        $update = Telegram::getWebhookUpdates();
        $result = json_decode($update, True);
        Log::info("Ok");
        Log::info($result);
    }
}
