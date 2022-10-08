<x-app-layout>
    <x-slot name="header">
        @include('snippets.header')
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <ul>
                    @foreach ($snippets as $snippet)
                        <li>
                            <a href="{{ route('snippets.show', ['snippet' => $snippet->id]) }}">
                                <div class="border px-4 py-4">
                                    <div class="font-bold text-lg">{{ $snippet->title }}</div>
                                    <div>
                                        <x-tag-list :tags="$snippet->tags"></x-tag-list>
                                    </div>
                                </div>
                            </a>
                        </li>
                    @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
