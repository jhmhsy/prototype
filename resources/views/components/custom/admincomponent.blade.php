<div class="alert alert-danger">
    <div class="alert-content">
        @if (isset($content))
        @include($content)
        @else
        {{ $slot }}
        @endif
    </div>
</div>