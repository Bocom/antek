<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight my-2 dark:text-gray-200">
            {{ __('Dashboard') }}
        </h1>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 gap-4 lg:grid-cols-3 lg:gap-8">
                <x-dashboard-panel :title="__('Latest Snippets')">
                    <ul class="flex flex-col gap-y-4">
                        @forelse ($latestSnippets as $snippet)
                            <x-snippet-item :$snippet></x-snippet-item>
                        @empty
                            <li>{{ __('There are no snippets.') }}</li>
                        @endforelse
                    </ul>
                </x-dashboard-panel>

                <x-dashboard-panel :title="__('Most Viewed Snippets')">
                    <ul class="flex flex-col gap-y-4">
                        @forelse ($mostViewedSnippets as $snippet)
                            <x-snippet-item :$snippet></x-snippet-item>
                        @empty
                            <li>{{ __('There are no snippets.') }}</li>
                        @endforelse
                    </ul>
                </x-dashboard-panel>

                <x-dashboard-panel :title="__('Favorite Snippets')" :href="route('snippets.favorites')">
                    <ul class="flex flex-col gap-y-4">
                        @forelse ($favoriteSnippets as $snippet)
                            <x-snippet-item :$snippet></x-snippet-item>
                        @empty
                            <li>{{ __('You have no favorite snippets.') }}</li>
                        @endforelse
                    </ul>

                    {{ $favoriteSnippets->links() }}
                </x-dashboard-panel>
            </div>
        </div>
    </div>
</x-app-layout>
