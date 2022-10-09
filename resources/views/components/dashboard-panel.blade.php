@props(['title'])

<div class="bg-white shadow-sm rounded-lg overflow-hidden border-b border-gray-200 p-6">
    <h2 class="font-bold text-xl mb-2">{{ $title }}</h2>

    <div>
        {{ $slot }}
    </div>
</div>
