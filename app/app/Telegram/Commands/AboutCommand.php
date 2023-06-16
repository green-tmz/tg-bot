<?php

namespace App\Telegram\Commands;

use Telegram\Bot\Commands\Command;

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
    protected string $description = 'Описание бота';

    /**
     * {@inheritdoc}
     */
    public function handle()
    {
        $response = $this->getUpdate();

        $text = 'Раздел пока надится в разработке';

        $this->replyWithMessage(compact('text'));
    }
}
