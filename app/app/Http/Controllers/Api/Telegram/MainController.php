<?php

namespace App\Http\Controllers\Api\Telegram;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Telegram\Bot\Laravel\Facades\Telegram;

class MainController extends Controller
{
    public static function commandsHandler()
    {
        $update = Telegram::getWebhookUpdates();
        $res = json_decode($update, true);
        Log::info($res['message']['text']);
    }
}
