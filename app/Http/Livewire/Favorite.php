<?php

namespace App\Http\Livewire;

use App\Models\Snippet;
use Livewire\Component;

class Favorite extends Component
{
    public Snippet $snippet;

    public bool $favorite = false;

    public function mount()
    {
        $this->favorite = request()->user()->favorites()->whereSnippetId($this->snippet->id)->exists();
    }

    public function toggle()
    {
        request()->user()->favorites()->toggle([$this->snippet->id]);
        $this->favorite = ! $this->favorite;
    }

    public function render()
    {
        return view('livewire.favorite');
    }
}
