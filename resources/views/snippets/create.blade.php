<x-app-layout>
    <x-slot name="header">
        @include('snippets.header')
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg dark:bg-gray-800">
                <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                    <h2 class="font-bold text-2xl mb-4 text-black dark:text-gray-200">{{ __('New Snippet') }}</h2>

                    <form method="POST" action="{{ route('snippets.store') }}">
                        @csrf

                        <div class="grid grid-cols-1 gap-y-6">
                            <div class="sm:col-span-6">
                                <x-input-label for="title">{{ __('Title') }}</x-input-label>

                                <div class="mt-1">
                                    <x-text-input type="text" id="title" name="title" class="w-full" :value="old('title')" />
                                </div>

                                <x-input-error :messages="$errors->get('title')" class="mt-1" />
                            </div>

                            <div class="sm:col-span-6">
                                <x-input-label for="title">{{ __('Tags') }}</x-input-label>

                                <div class="mt-1">
                                    <x-tag-select id="tags" name="tags" :value="old('tags')" />
                                </div>
                            </div>

                            <div class="sm:col-span-6">
                                <x-input-label for="title">{{ __('Content') }}</x-input-label>

                                <div class="mt-1">
                                    <x-textarea id="content" name="content" rows="12">{{ old('content') }}</x-textarea>
                                </div>

                                <x-input-error :messages="$errors->get('content')" class="mt-1" />
                            </div>
                        </div>

                        @include('snippets.file-form', ['defaultFiles' => '[]'])

                        <div class="mt-4">
                            <x-primary-button>{{ __('Create') }}</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
