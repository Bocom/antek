<div class="w-6 h-6">
    <button type="button" wire:click="toggle">
        @if ($favorite)
            <span class="sr-only">{{ __('Remove from favorites') }}</span>
            <x-icons.star class="w-6 h-6 text-yellow-300" />
        @else
            <span class="sr-only">{{ __('Add to favorites') }}</span>
            <x-icons.star-outline class="w-6 h-6" />
        @endif
    </button>
</div>
