<?php

namespace App\Http\Controllers\Panel\Settings;

use App\Http\Controllers\Api\Telegram\MainController as TelegramMainController;
use App\Models\Settings;
use Illuminate\Http\Request;
use App\Http\Forms\SettingsForm;
use App\Http\Controllers\Controller;
use App\Http\Requests\SettingsRequest;

class MainController extends Controller
{
    public function index(SettingsRequest $request)
    {
        $model = Settings::first();
        return view('panel.settings.main', [
            'model' => $model,
            'attributes' => $request->attributes(),
            'request' => $request
        ]);
    }

    public function upload(SettingsForm $request)
    {
        // dd($request->logo->extension());
        $model = Settings::first();

        if ($request->name) {
            $newName = (new TelegramMainController)->setName($request->name);
            if (!$newName['ok']) {
                return back()
                    ->with('error', $newName['description']);
            }
            $model->name = $request->name;
        }

        if ($request->token) {
            $model->token = $request->token;
        }

        if ($request->logo) {
            $imageName = time().'.'.$request->logo->extension();
            $request->logo->move(public_path('images'), $imageName);
            $model->logo = $imageName;
        }

        if ($model->save()) {
            return back()
                ->with('success','Настройки успешно сохранены');
        };
    }
}
