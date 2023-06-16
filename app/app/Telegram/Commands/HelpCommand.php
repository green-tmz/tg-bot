<?php

namespace App\Telegram\Commands;

use Telegram\Bot\Commands\Command;

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
     * @var string Command Description
     */
    protected string $description = 'Основные команды';

    /**
     * {@inheritdoc}
     */
    public function handle()

    {
        $commands = $this->getTelegram()->getCommands();

        $text = sprintf('**Список основных команд:**'.PHP_EOL);
        foreach ($commands as $name => $command) {
            $text .= sprintf('/%s - %s' . PHP_EOL, $name, $command->getDescription());
        }

        $this->replyWithMessage(['text' => $text]);

    }
}
