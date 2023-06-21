@extends('layouts.app', [
    'title' => 'Основные настройки'
])

@section('content')
<div class="card mb-5 mb-xl-10">
    <div id="kt_account_settings_profile_details" class="collapse show">
        {{ Form::open([
            'url' => route('settings.main.upload'),
            'method' => 'PUT',
            'class' => 'form',
            'id' => 'update-fraction-form',
            'enctype' => "multipart/form-data"
        ]) }}

            @include('panel.settings._form', ['model' => $model, 'attributes' => $attributes])

            <x-form-errors :errors="$errors" />

            <div class="text-end">
                <button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit">
                    <span class="indicator-label">Сохранить</span>
                    <span class="indicator-progress">Отправка...
                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                </button>
            </div>
        {{ Form::close() }}
    </div>
</div>
@endsection
