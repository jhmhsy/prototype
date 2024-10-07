@props(['value', 'errors', 'for', 'float' => false])
<div class="relative mb-2">
    @if ($value)
    @unless ($float)
    <x-forms.input-label :$value for="{{ $for }}" />
    @endunless
    {{ $slot }}
    @if ($float)
    <x-custom.floating-label :$value for="{{ $for }}" />
    @endif
    @endif
    <x-custom.error :$errors />
</div>