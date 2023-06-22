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
            'name' => 'required|min:3|max:20',
            'token' => 'required|min:10',
            'desc' => 'max:255'
        ];
    }
}
