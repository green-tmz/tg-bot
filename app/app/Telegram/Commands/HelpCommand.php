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
        $response = $this->getUpdate();

        $text = '**Список основных команд:** \n\n';
        // $text .= '/start - основное меню \n\n';
        // $text .= '/help - список основных команд \n\n';
        // $text .= '/about - описание бота \n\n';

        // $this->sendMessage([
        //     'chat_id' => $response->message->from->id,
        //     'text' => $text
        // ]);
        $commands = $this->getTelegram()->getCommands();

        $text = '';
        foreach ($commands as $name => $command) {
            $text .= sprintf('/%s - %s' . PHP_EOL, $name, $command->getDescription());
        }

        $this->replyWithMessage(['text' => $text]);

    }
}
