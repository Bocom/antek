@props(['disabled' => false])

<textarea
    {{ $disabled ? 'disabled' : '' }}
    {!! $attributes->merge([
        'class' => 'block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm bg-white text-black dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600',
        'rows' => 3
    ]) !!}
>{{ $slot }}</textarea>
