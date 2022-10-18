@props(['tag', 'clickable' => true])

<li {{ $attributes->merge(['class' => '']) }}>
    @if ($clickable)
        <a href="{{ route('snippets.tag', ['tag' => $tag->name]) }}" class="underline hover:no-underline">
            #{{ $tag->name }}
        </a>
    @else
        <span>#{{ $tag->name }}</span>
    @endif
</li>
