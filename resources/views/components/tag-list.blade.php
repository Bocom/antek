@props(['tags'])

<ul {{ $attributes->merge(['class' => 'flex gap-x-2']) }}>
    @foreach ($tags as $tag)
        <li>#{{ $tag->name }}</li>
    @endforeach
</ul>
