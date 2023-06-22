<?php

namespace App\Http\Controllers\Panel\Settings;

use App\Models\Settings;
use Illuminate\Http\Request;
use App\Http\Forms\SettingsForm;
use App\Http\Controllers\Controller;
use App\Http\Requests\SettingsRequest;
use App\Http\Controllers\Api\Telegram\WebhookController;
use App\Http\Controllers\Api\Telegram\MainController as TelegramMainController;

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
        $save = false;
        $model = Settings::first();
        $model->name = $request->name;
        $model->token = $request->token;

        if ($model->isDirty('name')) {
            $result = (new TelegramMainController)->setName($request->name);
            $newName = json_decode($result);
            if (!$newName->ok) {
                return back()
                    ->with('error', $newName->description);
            }
            $save = true;
        }

        if ($model->isDirty('token')) {
            $webhook = (new WebhookController)->setWebhook($request->token);
            if (!$webhook) {
                return back()
                    ->with('error', 'Токен указан не верно');
            }
            $save = true;
        }

        if ($request->logo) {
            $imageName = time().'.'.$request->logo->extension();
            $request->logo->move(public_path('images'), $imageName);
            $model->logo = $imageName;

        }

        if ($save) $model->save();

        return back()
            ->with('success','Настройки успешно сохранены');
    }
}
