@props(['value', 'errors', 'for', 'float' => false])
<div class="relative">
    @if ($value)
    @unless ($float)
    <x-custom.input-label :$value for="{{ $for }}" />
    @endunless
    {{ $slot }}
    @if ($float)
    <x-custom.floating-label :$value for="{{ $for }}" />
    @endif
    @endif
    <x-forms.error :$errors />
</div>