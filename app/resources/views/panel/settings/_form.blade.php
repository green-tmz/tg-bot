<div class="card-body border-top p-9">
    <x-form-input-group template="components.forms.upload-file"
        label="{{ $attributes['logo'] ?? '' }}"
        logo="{{ $model->logo }}"
        :input="Form::file('logo')"
        :error="$errors->first('logo')"
    />

    <x-form-input-group horizontal label="{{ $attributes['name'] }}" :input="Form::text('name', old('name', $model->name), [
        'class' => 'form-control form-control-solid mb-3 mb-lg-0',
        'placeholder' => $attributes['name']
    ])" required :error="$errors->first('name')" />


    <x-form-input-group horizontal label="{{ $attributes['token'] ?? ''}}" :input="Form::text('token', old('token', $model->token), [
        'class' => 'form-control form-control-solid mb-3 mb-lg-0',
        'placeholder' => $attributes['token']
    ])" required :error="$errors->first('token')" />
</div>

