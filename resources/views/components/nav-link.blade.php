@props(['active'])

@php
$classes = 'inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium leading-5 transition duration-150 ease-in-out ';
$classes .= ($active ?? false)
    ? 'border-indigo-400 text-gray-900 focus:outline-none focus:border-indigo-700 dark:text-gray-200'
    : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 dark:text-gray-400 dark:hover:text-gray-200';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
