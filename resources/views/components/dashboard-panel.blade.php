@props(['title', 'href' => null])

<div class="bg-white shadow-sm rounded-lg overflow-hidden border-b border-gray-200 p-6">
    <h2 class="font-bold text-xl mb-2">
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
