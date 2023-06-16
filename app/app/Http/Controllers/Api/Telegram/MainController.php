<?php

namespace App\Http\Controllers\Api\Telegram;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;

class MainController extends Controller
{
    public static function commandsHandler($request)
    {
        Log::info($request);
    }
}
