<x-app-layout>
    <x-slot name="header">
        @include('snippets.header')
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="font-bold text-xl mb-4">
                        @if (!isset($type))
                            {{ __('All Snippets') }}
                        @elseif ($type === 'author')
                            {{ __('Snippets by :name', ['name' => $author->name]) }}
                        @elseif ($type === 'tag')
                            {{ __('Snippets Tagged #:tag', ['tag' => $tag->name]) }}
                        @endif
                    </h2>

                    <ul class="flex flex-col gap-y-4">
                        @forelse ($snippets as $snippet)
                            <x-snippet-item :$snippet></x-snippet-item>
                        @empty
                            <li>{{ __('There are no snippets.') }}</li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
