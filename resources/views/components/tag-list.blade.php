@props(['tags', 'clickable' => true])

<ul {{ $attributes->merge(['class' => 'flex gap-x-2']) }}>
    @foreach ($tags as $tag)
        <x-tag :$tag :$clickable></x-tag>
    @endforeach
</ul>
