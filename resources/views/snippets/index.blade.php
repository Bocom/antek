<x-app-layout>
    <x-slot name="header">
        @include('snippets.header')
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="font-bold text-xl">
                            @if (!isset($type))
                                {{ __('All Snippets') }}
                            @elseif ($type === 'author')
                                {{ __('Snippets by :name', ['name' => $author->name]) }}
                            @elseif ($type === 'tag')
                                {{ __('Snippets Tagged #:tag', ['tag' => $tag->name]) }}
                            @elseif ($type === 'favorites')
                                {{ __('Favorite Snippets') }}
                            @endif
                        </h2>

                        <form method="GET">
                            <div class="flex gap-x-4 items-center">
                                <div>
                                    <select id="limit" name="limit">
                                        <option @selected(request('limit') == 5)>5</option>
                                        <option @selected(request('limit', 10) == 10)>10</option>
                                        <option @selected(request('limit') == 20)>20</option>
                                        <option @selected(request('limit') == 45)>45</option>
                                        <option @selected(request('limit') == 75)>75</option>
                                        <option @selected(request('limit') == 100)>100</option>
                                    </select>
                                    <label for="limit">{{ __('Per page') }}</label>
                                </div>

                                <x-primary-button>{{ __('Filter') }}</x-primary-button>
                            </div>
                        </form>
                    </div>

                    <ul class="flex flex-col gap-y-4">
                        @forelse ($snippets as $snippet)
                            <x-snippet-item :$snippet></x-snippet-item>
                        @empty
                            <li>{{ __('There are no snippets.') }}</li>
                        @endforelse
                    </ul>

                    {{ $snippets->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
