<x-app-layout>
    <x-slot name="header">
        @include('snippets.header')
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-8 only:mb-0">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="border-b mb-4">
                        <div class="flex justify-between items-center mb-2">
                            <h2 class="font-bold text-2xl">{{ $snippet->title }}</h2>

                            <a
                                href="{{ route('snippets.edit', ['snippet' => $snippet->id]) }}"
                                class="underline hover:no-underline"
                            >
                                {{ __('Edit') }}
                            </a>
                        </div>

                        <div>
                            <p>
                                <span>{{ __('By') }}:</span>
                                <a
                                    href="{{ route('snippets.author', ['author' => $snippet->author_id]) }}"
                                    class="underline hover:no-underline"
                                >
                                    {{ $snippet->author->name }}
                                </a>
                            </p>
                            <p>{{ __('Created at') }}: {{ $snippet->created_at }}</p>
                        </div>

                        <x-tag-list class="my-4" :tags="$snippet->tags"></x-tag-list>
                    </div>

                    <x-snippet-content :content="$snippet->content"></x-snippet-content>
                </div>
            </div>

            @foreach ($snippet->files as $file)
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-8 last:mb-0">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <h3 class="font-bold text-2xl mb-4">{{ $file->filename }}</h3>

                        <x-snippet-content :content="$file->content"></x-snippet-content>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
