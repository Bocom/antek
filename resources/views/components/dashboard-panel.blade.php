@props(['title', 'href' => null])

<div class="bg-white shadow-sm sm:rounded-lg overflow-hidden border-b border-gray-200 p-6 dark:bg-gray-800 dark:border-gray-800">
    <h2 class="font-bold text-xl mb-2 text-black dark:text-gray-200">
        @isset($href)
            <a href="{{ $href }}">{{ $title }}</a>
        @else
            {{ $title }}
        @endisset
    </h2>

    <div>
        {{ $slot }}
    </div>
</div>
