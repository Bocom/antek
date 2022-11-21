@props(['content', 'type' => 'text'])

<x-markdown class="snippet-content snippet-content--{{ $type }}">
    {!! $content !!}
</x-markdown>

@pushOnce('styles')
    @vite('resources/css/components/snippet.css')
@endPushOnce
