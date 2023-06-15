<?php

namespace App\Telegram\Commands;

use Telegram\Bot\Commands\Command;

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
        $response = $this->getUpdate();

        $text = 'Test test 123';

        $this->replyWithMessage(compact('text'));

    }
}
