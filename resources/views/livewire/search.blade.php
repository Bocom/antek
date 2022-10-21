<div class="relative">
    <div class="w-full max-w-lg lg:max-w-xs">
        <label for="search" class="sr-only">{{ __('Search') }}</label>
        <div class="relative text-gray-400 focus-within:text-gray-600">
            <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                <x-icons.search class="w-5 h-5" />
            </div>
            <input
                type="search"
                id="search"
                class="block w-full rounded-md border border-gray-300 bg-white py-2 pl-10 pr-3 leading-5 text-gray-900 placeholder-gray-500 focus:border-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-indigo-600 sm:text-sm"
                placeholder="Search"
                wire:input.debounce.200ms="search($event.target.value)"
            >
        </div>
    </div>

    @if ($searching)
        <div class="absolute mt-1 bg-white p-2 rounded-md shadow-lg border border-gray-100 w-full" x-cloak>
            <div wire:loading>
                {{ __('Searching...') }}
            </div>

            <div wire:loading.remove>
                @if (count($results) === 0)
                    <span>{{ __('No snippets found') }}</span>
                @else
                    <ul class="flex flex-col gap-y-1" v-else>
                        @foreach ($results as $result)
                            <li>
                                <a href="{{ $result->link }}" class="flex w-full p-2 hover:bg-gray-100 rounded">
                                    {{ $result->title }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
    @endif
</div>
