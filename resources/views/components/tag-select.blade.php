@props(['name', 'options' => [], 'selected'])

<x-text-input type="text" {{ $attributes->merge(['name' => $name]) }} />

@pushOnce('scripts')
    @vite('resources/js/tags.js')
@endPushOnce
@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const choices = new Choices('[name="{{ $name }}"]', {
                removeItemButton: true,
                duplicateItemsAllowed: false,
                delimiter: '|',
                noResultsText: `{{ __('No tags found') }}`,
            });
        });
    </script>
@endpush
