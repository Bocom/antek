<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Snippets') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST">
                        @csrf

                        <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                            <div class="sm:col-span-6">
                                <label for="name" class="block text-sm font-medium text-gray-700">{{ __('Title') }}</label>
                                <div class="mt-1">
                                    <x-text-input type="text" id="name" name="name" class="w-full"></x-text-input>
                                </div>
                            </div>

                            <div class="sm:col-span-6">
                                <label for="name" class="block text-sm font-medium text-gray-700">{{ __('Tags') }}</label>
                                <div class="mt-1">
                                    <x-tag-select id="tags" name="tags"></x-tag-select>
                                </div>
                            </div>

                            <div class="sm:col-span-6">
                                <label for="content" class="block text-sm font-medium text-gray-700">{{ __('Description') }}</label>
                                <div class="mt-1">
                                    <x-textarea id="content" name="content" rows="12"></x-textarea>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
