@props(['value'])

<p {{ $attributes->merge(['class' => 'block text-gray-500 dark:text-thirdy']) }}>
    {{ $value ?? $slot }}
</p>