@props(['snippet'])

@php
$isFavorite = request()->user()->favorites->contains($snippet);
@endphp

<li class="rounded-lg">
    <a
        href="{{ route('snippets.show', ['snippet' => $snippet->id]) }}"
        {!! $isFavorite ? ('title="' . __('Favorite snippet') . '"') : '' !!}
    >
        <div class="border px-4 py-4 rounded-lg shadow-sm hover:bg-gray-50 flex items-center">
            <div class="flex-grow">
                <div class="font-bold text-lg">{{ $snippet->title }}</div>
                <x-tag-list :tags="$snippet->tags" :clickable="false"></x-tag-list>
            </div>

            @if ($isFavorite)
                <div class="flex-shrink-0">
                    <x-icons.star class="w-5 h-5 text-yellow-300" :title="__('Favorite snippet')" />
                </div>
            @endif
        </div>
    </a>
</li>
