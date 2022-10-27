<x-app-layout>
    <x-slot name="header">
        @include('snippets.header')
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg dark:bg-gray-800">
                <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="font-bold text-xl text-black dark:text-gray-200">{{ $title }}</h2>

                        <form method="GET">
                            <div class="flex gap-x-4 items-center">
                                <div>
                                    <select
                                        id="limit"
                                        name="limit"
                                        class="rounded-md border-gray-300 py-2 pl-3 pr-10 text-base focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm bg-white dark:bg-gray-700 dark:text-gray-200 dark:border-gray-800"
                                    >
                                        <option @selected(request('limit') == 5)>5</option>
                                        <option @selected(request('limit', 10) == 10)>10</option>
                                        <option @selected(request('limit') == 20)>20</option>
                                        <option @selected(request('limit') == 45)>45</option>
                                        <option @selected(request('limit') == 75)>75</option>
                                        <option @selected(request('limit') == 100)>100</option>
                                    </select>
                                    <label for="limit" class="text-black dark:text-gray-200">{{ __('Per page') }}</label>
                                </div>

                                <x-primary-button>{{ __('Filter') }}</x-primary-button>
                            </div>
                        </form>
                    </div>

                    <ul class="flex flex-col gap-y-4">
                        @forelse ($snippets as $snippet)
                            <x-snippet-item :$snippet></x-snippet-item>
                        @empty
                            <li class="text-black dark:text-gray-300">{{ __('There are no snippets.') }}</li>
                        @endforelse
                    </ul>

                    {{ $snippets->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
