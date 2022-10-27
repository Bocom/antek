<?php

namespace App\Http\Livewire;

use App\Models\Snippet;
use Livewire\Component;

class Search extends Component
{
    public bool $searching = false;

    public $results = [];

    public function search($query)
    {
        if ($query === '') {
            $this->searching = false;
            $this->results = [];

            return;
        }

        $this->searching = true;

        $this->results = Snippet::search($query)->get()->map(fn ($s) => (object) [
            'id' => $s->id,
            'title' => $s->title,
            'link' => route('snippets.show', ['snippet' => $s->id]),
        ]);
    }

    public function render()
    {
        return view('livewire.search');
    }
}
