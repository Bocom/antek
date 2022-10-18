@props(['content', 'dark' => false])

<x-markdown class="snippet__content">
    {!! $content !!}
</x-markdown>

@pushOnce('styles')
    @vite('resources/css/components/snippet.css')
@endPushOnce
