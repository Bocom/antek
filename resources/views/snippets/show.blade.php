<x-app-layout>
    <x-slot name="header">
        @include('snippets.header')
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="font-bold text-2xl">{{ $snippet->title }}</h2>

                    <div>
                        <p>{{ __('By') }}: {{ $snippet->author->name }}</p>
                        <p>{{ __('Created at') }}: {{ $snippet->created_at }}</p>
                        @if ($snippet->updated_at != $snippet->created_at)
                            <p>{{ __('Updated at') }}: {{ $snippet->updated_at }}</p>
                        @endif
                    </div>

                    <x-tag-list class="my-4" :tags="$snippet->tags"></x-tag-list>

                    <x-markdown>
                        {{ $snippet->content }}
                    </x-markdown>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
