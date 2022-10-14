<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SnippetFile extends Model
{
    use HasFactory;
    use HasUuids;

    public $fillable = [
        'filename',
        'content',
        'type',
        'syntax'
    ];

    public function codeBlock()
    {
        return "```{$this->syntax}\n{$this->content}\n```";
    }

    public function snippet()
    {
        return $this->belongsTo(Snippet::class);
    }
}
