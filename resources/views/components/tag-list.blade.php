@props(['tags', 'clickable' => true])

<ul {{ $attributes->merge(['class' => 'flex flex-wrap gap-x-2 text-black dark:text-gray-300']) }}>
    @foreach ($tags as $tag)
        <x-tag :$tag :$clickable></x-tag>
    @endforeach
</ul>
