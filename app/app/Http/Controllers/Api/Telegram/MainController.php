<?php

namespace App\Http\Controllers\Api\Telegram;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Telegram\Bot\Laravel\Facades\Telegram;

class MainController extends Controller
{
    public function index()
    {
        $response = Telegram::getWebhookUpdates();
        dd($response);
    }
}
