<x-app-layout>
    <x-slot name="header">
        @include('snippets.header')
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <ul class="flex flex-col gap-y-4">
                        @foreach ($snippets as $snippet)
                            <li class="rounded-lg">
                                <a href="{{ route('snippets.show', ['snippet' => $snippet->id]) }}">
                                    <div class="border px-4 py-4 rounded-lg shadow-sm hover:bg-gray-50">
                                        <div class="font-bold text-lg">{{ $snippet->title }}</div>
                                        <x-tag-list :tags="$snippet->tags"></x-tag-list>
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
