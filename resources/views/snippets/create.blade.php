<x-app-layout>
    <x-slot name="header">
        @include('snippets.header')
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="font-bold text-2xl mb-4">{{ __('New Snippet') }}</h2>

                    <form method="POST" action="{{ route('snippets.store') }}">
                        @csrf

                        <div class="grid grid-cols-1 gap-y-6">
                            <div class="sm:col-span-6">
                                <label for="title" class="block font-medium text-gray-700">{{ __('Title') }}</label>
                                <div class="mt-1">
                                    <x-text-input type="text" id="title" name="title" class="w-full" :value="old('title')" />
                                </div>
                                <x-input-error :messages="$errors->get('title')" class="mt-1" />
                            </div>

                            <div class="sm:col-span-6">
                                <label for="tags" class="block font-medium text-gray-700">{{ __('Tags') }}</label>
                                <div class="mt-1">
                                    <x-tag-select id="tags" name="tags" :value="old('tags')" />
                                </div>
                            </div>

                            <div class="sm:col-span-6">
                                <label for="content" class="block font-medium text-gray-700">{{ __('Content') }}</label>
                                <div class="mt-1">
                                    <x-textarea id="content" name="content" rows="12">{{ old('content') }}</x-textarea>
                                </div>
                                <x-input-error :messages="$errors->get('content')" class="mt-1" />
                            </div>
                        </div>

                        <div class="mt-4" x-data="{ files: {{ old('files', '[]') }} }">
                            <input type="hidden" name="files" :value="JSON.stringify(files)">

                            <div class="flex items-center gap-x-2">
                                <h3 class="font-bold text-xl">{{ __('Files') }}</h3>

                                <x-primary-button
                                    x-on:click.prevent="files.push({ filename: '', content: '' })"
                                    type="button"
                                >
                                    {{ __('Add') }}
                                </x-primary-button>
                            </div>

                            <div>
                                <template x-for="(file, idx) in files">
                                    <div class="grid grid-cols-1 gap-y-6 py-4 border-b first:border-0 first:pt-0">
                                        <div class="sm:col-span-6">
                                            <div class="flex">
                                                <label :for="`title-${idx}`" class="block font-medium text-gray-700">{{ __('Title/Filename') }}</label>

                                                <button type="button" x-on:click.prevent="files.splice(idx, 1)" class=" ml-2">
                                                    <x-icons.trash class="w-6 h-6 text-red-500" />
                                                </button>
                                            </div>

                                            <div class="mt-1">
                                                <x-text-input type="text" ::id="`title-${idx}`" class="w-full" x-model="file.filename" />
                                            </div>
                                        </div>

                                        <div class="sm:col-span-6">
                                            <label :for="`content-${idx}`" class="block font-medium text-gray-700">{{ __('Content') }}</label>

                                            <div class="mt-1">
                                                <x-textarea ::id="`content-${idx}`" rows="12" x-model="file.content"></x-textarea>
                                            </div>
                                        </div>
                                    </div>
                                </template>
                            </div>
                        </div>

                        <div class="mt-4">
                            <x-primary-button>Create</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
