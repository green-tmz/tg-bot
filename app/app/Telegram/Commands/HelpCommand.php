<?php

namespace App\Telegram\Commands;

use Telegram\Bot\Commands\Command;
use Telegram\Bot\Laravel\Facades\Telegram;

/**
 * Class HelpCommand.
 */
class HelpCommand extends Command
{
    /**
     * @var string Command Name
     */
    protected string $name = 'help';

    /**
     * @var array Command Aliases
     */
    protected array $aliases = ['listcommands'];

    /**
     * @var string Command Description
     */
    protected string $description = 'Help command, Get a list of all commands';

    /**
     * {@inheritdoc}
     */
    public function handle()

    {
        $response = Telegram::getUpdate();

        $text = 'Hey stranger, thanks for visiting me.'.chr(10).chr(10);
        $text .= 'I am a bot and working for'.chr(10);
        $text .= env('APP_URL').chr(10).chr(10);
        $text .= 'Please come and visit me there.'.chr(10);

        Telegram::replyWithMessage(compact('text'));

    }
}
