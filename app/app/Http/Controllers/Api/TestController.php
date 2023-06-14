<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use SergiX44\Nutgram\Nutgram;
use SergiX44\Nutgram\Configuration;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $config = new Configuration(
            clientTimeout: 10, // default in seconds, when contacting the Telegram API
            botName: 'Test',
            testEnv: true,
        );

        $bot = new Nutgram("6026856394:AAG75Wwj9sc_jijgn38rnyqj0XW53Cat5dk", $config);

        $bot->onCommand('start', function(Nutgram $bot) {
            $bot->sendMessage('Ciao!');
        });

        $bot->onText('My name is {name}', function(Nutgram $bot, string $name) {
            $bot->sendMessage("Hi $name");
        });

        $bot->run();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
