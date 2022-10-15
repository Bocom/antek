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

    <div class="absolute bg-white p-4 rounded-md shadow border-gray-300">
        <ul class="flex flex-col gap-y-4">
            <template x-for="result in results">
                <li><a :href="result.link" x-text="result.title"></a></li>
            </template>
        </ul>
    </div>
</div>
