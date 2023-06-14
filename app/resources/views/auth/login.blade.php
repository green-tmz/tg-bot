@extends('layouts.guest', [
    'title' => 'Авторизация'
])

@section('content')
<div class="d-flex flex-center flex-column flex-lg-row-fluid">
    <div class="w-lg-500px p-10">
        <form method="POST" class="form w-100" novalidate="novalidate" id="sign-in-form" action="{{ route('login') }}">
            @csrf
            <div class="text-center mb-11">
                <h1 class="text-dark fw-bolder mb-3">Авторизация</h1>
            </div>

            <div class="fv-row mb-8">
                <input type="text" placeholder="E-mail" name="email" autocomplete="off" class="form-control bg-transparent" />

                <div class="fv-plugins-message-container invalid-feedback">
                    <div data-field="email" data-form="sign-in-form"></div>
                </div>
            </div>
            <div class="fv-row mb-3">
                <input type="password" placeholder="Пароль" name="password" autocomplete="off" class="form-control bg-transparent" />

                <div class="fv-plugins-message-container invalid-feedback">
                    <div data-field="password" data-form="sign-in-form"></div>
                </div>
            </div>

            <div class="d-grid mb-10" style="margin-top: 4rem!important;">
                <button type="submit" id="sign-in-submit" class="btn btn-primary">
                    <span class="indicator-label">Войти</span>
                    <span class="indicator-progress">Загрузка...
                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

