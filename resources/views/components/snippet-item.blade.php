@props(['snippet'])

<li class="rounded-lg">
    <a href="{{ route('snippets.show', ['snippet' => $snippet->id]) }}">
        <div class="border px-4 py-4 rounded-lg shadow-sm hover:bg-gray-50">
            <div class="font-bold text-lg">{{ $snippet->title }}</div>
            <x-tag-list :tags="$snippet->tags" :clickable="false"></x-tag-list>
        </div>
    </a>
</li>
