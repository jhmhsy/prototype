@props(['value', 'errors', 'name'])
<div class="relative">
    {{ $slot }}
    @if ($value)
        <x-custom.floating-label :$value for="{{ $name }}"/>
    @endif
    <x-forms.error :$errors />
</div>