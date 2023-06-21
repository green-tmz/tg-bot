@if ($errors && $errors->any())
    <div class="alert alert-danger mb-7">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
