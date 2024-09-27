@props(['value'])

<label
    {{ $attributes->merge(['class' => 'block font-medium dark:bg-transparent text-sm text-shade_5 dark:text-gray-300']) }}>
    {{ $value ?? $slot }}
</label>