<?php

namespace App\Http\Forms;

use App\Http\Requests\SettingsRequest;

class SettingsForm extends SettingsRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'name' => 'min:3',
            'token' => 'required|min:10',
            'logo' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048'
        ];
    }
}
