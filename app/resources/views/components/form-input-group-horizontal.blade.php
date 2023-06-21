<div class="row mb-10">
    <label for="{{ $id }}" class="col-lg-4 col-form-label fw-semibold fs-6">
        @if($required)
            <span class="required">{{ $label}}</span>
        @else
            <span class="">{{ $label}}</span>
        @endif
        @if($description)
            <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" aria-label="{{ $description }}"></i>
        @endif
    </label>
    <div class="col-lg-8">
        <div class="row">
            <div class="col-lg-10 fv-row">
                {{ $input }}
                <div class="fv-plugins-message-container invalid-feedback" for="{{ $id }}">{{ $error }}</div>
            </div>
        </div>
    </div>
</div>
