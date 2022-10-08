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

                        <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                            <div class="sm:col-span-6">
                                <label for="title" class="block text-sm font-medium text-gray-700">{{ __('Title') }}</label>
                                <div class="mt-1">
                                    <x-text-input type="text" id="title" name="title" class="w-full" :value="old('title')" />
                                </div>
                                <x-input-error :messages="$errors->get('title')" class="mt-1" />
                            </div>

                            <div class="sm:col-span-6">
                                <label for="tags" class="block text-sm font-medium text-gray-700">{{ __('Tags') }}</label>
                                <div class="mt-1">
                                    <x-tag-select id="tags" name="tags" :value="old('tags')" />
                                </div>
                            </div>

                            <div class="sm:col-span-6">
                                <label for="content" class="block text-sm font-medium text-gray-700">{{ __('Content') }}</label>
                                <div class="mt-1">
                                    <x-textarea id="content" name="content" rows="12">{{ old('content') }}</x-textarea>
                                </div>
                                <x-input-error :messages="$errors->get('content')" class="mt-1" />
                            </div>
                        </div>

                        <div>
                            <x-primary-button>Create</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
