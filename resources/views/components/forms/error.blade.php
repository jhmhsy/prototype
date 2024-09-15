@props(['errors'])

@if ($errors)
    <ul {{ $attributes->merge(['class' => 'text-xs text-red-600 dark:text-red-400 space-y-1']) }}>
        @foreach ((array) $errors as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif
