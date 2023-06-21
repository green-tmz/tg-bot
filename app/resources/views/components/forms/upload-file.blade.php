<div class="row mb-6">
    <label class="col-lg-4 col-form-label fw-semibold fs-6">
        @if($required)
            <span class="required">{{ $label}}</span>
        @else
            <span class="">{{ $label}}</span>
        @endif
    </label>
    <div class="col-lg-8">
        <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('/images/{{ $logo}}')">
            <div class="image-input-wrapper w-125px h-125px" style="background-image: url('/images/{{ $logo}}')"></div>
            <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Изменить">
                <i class="ki-duotone ki-pencil fs-7">
                    <span class="path1"></span>
                    <span class="path2"></span>
                </i>
                {{ $input }}
            </label>
            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Отемена">
                <i class="ki-duotone ki-cross fs-2">
                    <span class="path1"></span>
                    <span class="path2"></span>
                </i>
            </span>
            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Удалить">
                <i class="ki-duotone ki-cross fs-2">
                    <span class="path1"></span>
                    <span class="path2"></span>
                </i>
            </span>
        </div>
        <div class="form-text">Allowed file types: jpg,png,jpeg,gif,svg.</div>
        <div class="fv-plugins-message-container invalid-feedback" for="{{ $id }}">{{ $error }}</div>
    </div>
</div>
