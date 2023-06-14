@props(['count'])

<a class="{{ $class }}" href="{{ $url }}">
    @if($icon)
        <span class="menu-bullet">
            <span class="{{ $icon }}"></span>
        </span>
    @endif
    <span class="menu-title">{{ $label }}</span>
    @if($count)
        <span class="menu-badge">
            <span class="badge badge-secondary">{{ $count }}</span>
        </span>
    @endif
</a>