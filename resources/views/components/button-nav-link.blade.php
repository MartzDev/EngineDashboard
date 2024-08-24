@props(['active'])

@php
    $classes =
        $active ?? false
            ? 'flex items-center p-2 text-white transition duration-200 ease-in-out transform rounded-lg focus:shadow-outline dark:text-white bg-blue-500 hover:text-white hover:scale-95 hover:bg-blue-500 dark:hover:bg-gray-700 group'
            : 'flex items-center p-2 text-gray-900 transition duration-200 ease-in-out transform rounded-lg hover:text-blue-500 hover:bg-gray-100 hover:text-dark-900 hover:scale-95 dark:text-white dark:hover:bg-gray-700 group';
@endphp

<button type="button" {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</button>
