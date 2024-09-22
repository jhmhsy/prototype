@props(['value'])

<p {{ $attributes->merge(['class' => 'block text-gray-600 dark:text-tertiary']) }}>
    {{ $value ?? $slot }}
</p>