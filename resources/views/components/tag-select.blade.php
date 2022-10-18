@props(['name', 'selected', 'value' => null])

<x-text-input type="text" {{ $attributes->merge(['name' => $name]) }} :$value />

@pushOnce('scripts')
    @vite(['resources/js/tags.js', 'resources/css/components/tags.css'])
    <script>
        window.existingTags = {{ Js::from(App\Models\Tag::all()->pluck('name')) }};
    </script>
@endPushOnce
@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const tags = new Tagify(document.querySelector('[name="{{ $name }}"]'), {
                whitelist: window.existingTags,
            });
        });
    </script>
@endpush
