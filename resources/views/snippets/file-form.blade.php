<div class="mt-4" x-data="{ files: {{ old('files', $defaultFiles) }} }">
    <input type="hidden" name="files" :value="JSON.stringify(files)">

    <div class="flex items-center gap-x-2">
        <h3 class="font-bold text-xl">{{ __('Files') }}</h3>

        <x-primary-button
            x-on:click.prevent="files.push({ filename: '', content: '', type: 'text', syntax: null })"
            type="button"
        >
            {{ __('Add') }}
        </x-primary-button>
    </div>
    <div>
        <template x-for="(file, idx) in files">
            <div class="grid grid-cols-1 gap-y-4 py-4 border-b first:border-0 first:pt-0">
                <div>
                    <div class="flex">
                        <label :for="`title-${idx}`" class="block font-medium text-gray-700">
                            {{ __('Title/Filename') }}
                        </label>

                        <button
                            type="button"
                            x-on:click.prevent="files.splice(idx, 1)"
                            class="ml-2"
                        >
                            <x-icons.trash class="w-6 h-6 text-red-500" />
                        </button>
                    </div>

                    <x-text-input
                        type="text"
                        ::id="`title-${idx}`"
                        class="w-full mt-1"
                        x-model="file.filename"
                    />
                </div>

                <div class="flex">
                    <div class="mr-4">
                        <label :for="`type-${idx}`" class="block font-medium text-gray-700">
                            {{ __('Type') }}
                        </label>

                        <select
                            :id="`type-${idx}`"
                            class="rounded-md shadow-sm border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
                            x-model="file.type"
                            @change="(e) => file.type === 'text' ? (file.syntax = null) : null"
                        >
                            <option value="text">{{ __('Text') }}</option>
                            <option value="code">{{ __('Code') }}</option>
                        </select>
                    </div>

                    <div x-show="file.type === 'code'">
                        <label
                            :for="`syntax-${idx}`"
                            class="block font-medium text-gray-700"
                        >
                            {{ __('Syntax') }}
                        </label>

                        <select
                            :id="`syntax-${idx}`"
                            class="rounded-md shadow-sm border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
                            x-model="file.syntax"
                        >
                            <option>{{ __('Select syntax') }}</option>
                            <option value="js">JavaScript</option>
                            <option value="json">JSON</option>
                            <option value="blade">Laravel Blade</option>
                            <option value="php">PHP</option>
                            <option value="yaml">YAML</option>
                        </select>
                    </div>
                </div>

                <div>
                    <label :for="`content-${idx}`" class="block font-medium text-gray-700">
                        {{ __('Content') }}
                    </label>

                    <x-textarea
                        ::id="`content-${idx}`"
                        class="mt-1"
                        rows="12"
                        x-model="file.content"
                    ></x-textarea>
                </div>
            </div>
        </template>
    </div>
</div>
