@props(['value', 'errors', 'name'])
<div>
    @if ($value)
        <x-forms.input-label :$value for="{{ $name }}"/>
    @endif
    {{ $slot }}
    <x-forms.error :$errors />
</div>