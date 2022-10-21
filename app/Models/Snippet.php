<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Attributes\SearchUsingFullText;
use Laravel\Scout\Searchable;

class Snippet extends Model
{
    use HasFactory;
    use HasUuids;
    use Searchable;

    public $fillable = [
        'author_id',
        'title',
        'content',
    ];

    public $casts = [
        'views' => 'integer',
    ];

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function files()
    {
        return $this->hasMany(SnippetFile::class);
    }

    #[SearchUsingFullText(['content'])]
    public function toSearchableArray()
    {
        return [
            'title' => $this->title,
            'content' => $this->content,
            'tags' => $this->tags->map->name->all(),
        ];
    }
}
