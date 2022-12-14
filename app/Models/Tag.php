<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    use HasUuids;

    public $fillable = [
        'name',
    ];

    public function snippets()
    {
        return $this->belongsToMany(Snippet::class);
    }
}
