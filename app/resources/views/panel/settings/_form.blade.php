<div class="card-body border-top p-9">
    <x-form-input-group horizontal label="{{ $attributes['name'] }}" :input="Form::text('name', old('name', $model->name), [
        'class' => 'form-control form-control-solid mb-3 mb-lg-0',
        'placeholder' => $attributes['name']
    ])" :error="$errors->first('name')" />

    <x-form-input-group horizontal label="{{ $attributes['token'] ?? ''}}" :input="Form::text('token', old('token', $model->token), [
        'class' => 'form-control form-control-solid mb-3 mb-lg-0',
        'placeholder' => $attributes['token']
    ])" required :error="$errors->first('token')" />

    <x-form-input-group horizontal label="{{ $attributes['desc'] ?? ''}}" :input="Form::textarea('desc', old('desc', $model->desc), [
        'class' => 'form-control form-control-solid mb-3 mb-lg-0',
        'style' => 'resize:none',
        'placeholder' => $attributes['desc']
    ])" :error="$errors->first('desc')" />
</div>

