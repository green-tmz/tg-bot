<?php

namespace App\Telegram\Commands;

use Telegram\Bot\Commands\Command;
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
    protected array $aliases = ['listcommands123'];

    /**
     * @var string Command Description
     */
    protected string $description = 'Test command';

    /**
     * {@inheritdoc}
     */
    public function handle()

    {
        $response = Telegram::getUpdate();

        $text = 'Test test';

        Telegram::replyWithMessage(compact('text'));

    }
}
