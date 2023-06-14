<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SergiX44\Nutgram\Nutgram;

class DashboardController extends Controller
{
    public function index(Nutgram $bot) {
        return view('dashboard');
    }
}
