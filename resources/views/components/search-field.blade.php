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
    <div class="flex ">
        <input
            @input.debounce.300ms="search"
            class="p-2 rounded-md rounded-r-none shadow-sm border border-r-0 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
            placeholder="{{ __('Search...') }}"
        >

        <button
            type="button"
            class="pl-2rounded-md rounded-l-none shadow-sm border border-l-0"
            x-on:click="search"
        >
            <x-icons.search class="w-6 h-6" />
        </button>
    </div>

    <div class="absolute bg-white p-2 rounded-md shadow border-gray-300 w-full" x-cloak x-show="results.length > 0">
        <ul class="flex flex-col gap-y-1">
            <template x-for="result in results">
                <li><a :href="result.link" class="flex w-full p-2 hover:bg-gray-50" x-text="result.title"></a></li>
            </template>
        </ul>
    </div>
</div>
