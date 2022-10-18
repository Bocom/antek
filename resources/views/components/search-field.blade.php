<div {{ $attributes->class(['relative']) }} x-data="{
    results: [],
    searching: false,

    async search(event) {
        await this.fetchResults(event.target.value);
    },
    async fetchResults(query) {
        if (query === '') {
            this.results = [];
            return;
        }

        this.searching = true;

        const response = await fetch(`/api/search?q=${query}`);
        this.results = await response.json();

        this.searching = false;
    },
}">
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
                @input.debounce.300ms="search"
            >
        </div>
    </div>

    <div class="absolute bg-white p-2 rounded-md shadow border-gray-300 w-full" x-cloak x-show="results.length > 0">
        <ul class="flex flex-col gap-y-1">
            <template x-for="result in results">
                <li><a :href="result.link" class="flex w-full p-2 hover:bg-gray-50" x-text="result.title"></a></li>
            </template>
        </ul>
    </div>
</div>
