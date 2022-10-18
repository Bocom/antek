<div class="w-6 h-6">
    <button type="button" wire:click="toggle">
        @if ($favorite)
            <x-icons.star class="w-6 h-6 text-yellow-300" />
        @else
            <x-icons.star-outline class="w-6 h-6" />
        @endif
    </button>
</div>
