<div class="mt-4" x-data="{ files: {{ old('files', $defaultFiles) }} }">
    <input type="hidden" name="files" :value="JSON.stringify(files)">

    <div class="flex items-center gap-x-2">
        <h3 class="font-bold text-xl text-black dark:text-gray-200">{{ __('Files') }}</h3>

        <x-primary-button
            x-on:click.prevent="files.push({ filename: '', content: '', type: 'text', syntax: null })"
            type="button"
        >
            {{ __('Add') }}
        </x-primary-button>
    </div>
    <div>
        <template x-for="(file, idx) in files">
            <div class="grid grid-cols-1 gap-y-4 py-4 border-b first:border-0 first:pt-0 dark:border-gray-400">
                <div>
                    <div class="flex items-center">
                        <x-input-label ::for="`title-${idx}`">{{ __('Title/Filename') }}</x-input-label>

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
                        <x-input-label ::for="`type-${idx}`">{{ __('Type') }}</x-input-label>

                        <select
                            :id="`type-${idx}`"
                            class="rounded-md shadow-sm border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 bg-white dark:bg-gray-700 dark:text-gray-200 dark:border-gray-800"
                            x-model="file.type"
                            @change="(e) => file.type === 'text' ? (file.syntax = null) : null"
                        >
                            @foreach (SnippetFileType::cases() as $fileType)
                                <option value="{{ $fileType->value }}">{{ __($fileType->name) }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div x-show="file.type === 'code'">
                        <x-input-label ::for="`syntax-${idx}`">{{ __('Syntax') }}</x-input-label>

                        <select
                            :id="`syntax-${idx}`"
                            class="rounded-md shadow-sm border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 bg-white dark:bg-gray-700 dark:text-gray-200 dark:border-gray-800"
                            x-model="file.syntax"
                        >
                            <option>{{ __('Select syntax') }}</option>
                            <option value="js">JavaScript</option>
                            <option value="ts">TypeScript</option>
                            <option value="json">JSON</option>
                            <option value="blade">Laravel Blade</option>
                            <option value="php">PHP</option>
                            <option value="yaml">YAML</option>
                            <option value="md">Markdown</option>
                        </select>
                    </div>
                </div>

                <div>
                    <x-input-label ::for="`content-${idx}`">{{ __('Content') }}</x-input-label>

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
