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

        $text = "<b>Список доступных команд:</b>".PHP_EOL;

        $this->replyWithMessage([
            'text' => $text,
            'parse_mode' => 'html'
        ]);

    }
}
