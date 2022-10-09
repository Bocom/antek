@props(['name', 'options' => [], 'selected', 'value' => null])

<x-text-input type="text" {{ $attributes->merge(['name' => $name]) }} :$value />

@pushOnce('scripts')
    @vite('resources/js/tags.js')
    <script>
        window.existingTags = {{ Js::from(App\Models\Tag::all()->pluck('name')->map(fn ($tag) => ['label' => $tag, 'value' => $tag])) }};
    </script>
@endPushOnce
@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const choices = new Choices('[name="{{ $name }}"]', {
                choices: window.existingTags,
                removeItemButton: true,
                duplicateItemsAllowed: false,
                delimiter: '|',
                noResultsText: `{{ __('No tags found') }}`,
            });
        });
    </script>
@endpush
