<?php

namespace App\Http\Controllers\Api\Telegram;

use GuzzleHttp\json;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Telegram\Bot\FileUpload\InputFile;
use Telegram\Bot\Laravel\Facades\Telegram;

class MainController extends Controller
{
    public static function commandsHandler()
    {
        $updates = Telegram::getWebhookUpdates();
        $text = "Привет ".$updates->message->from->first_name.PHP_EOL;
        // $text .= "/help - Основные команды".PHP_EOL;
        // $text .= "/about - Описание бота".PHP_EOL;
        // $text .= "/start - Основное меню".PHP_EOL;

        // Telegram::sendMessage([
        //     'chat_id' => $updates->message->from->id,
        //     'text' => $text,
        //     'parse_mode' => 'html'
        // ]);

        // Log::info(Telegram::getMe());

        // InputFile::create('http://stream.delovaya-volna.ru/radio/DACHA_TUIMAZY.MP3', 'DACHA_TUIMAZY');

        // $res = Telegram::sendAudio([
        //     'chat_id' => $updates->message->from->id,
        //     'audio' => 'http://stream.delovaya-volna.ru/radio/DACHA_TUIMAZY.MP3',
        //     // 'parse_mode' => 'html'
        // ]);

        $inputMediaPhoto = ["type" => "audio", "media" => 'http://stream.delovaya-volna.ru/radio/DACHA_TUIMAZY.MP3', "caption" => '', "parse_mode" => "Markdown"];
        $inputMediaPhoto = json_encode($inputMediaPhoto);


        $res = Telegram::sendMessageMedia([
                'chat_id' => $updates->message->from->id,
                // 'message_id' => $message_id,
                'media' => $inputMediaPhoto
        ]);

        Log::info($res);
    }
}
