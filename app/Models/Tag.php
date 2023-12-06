<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function posts(): BelongsToMany
    {   // post_tag pivot table will have many posts associated to many tags
        return $this->belongsToMany(Post::class, 'post_tag', 'tag_id', 'post_id');
    }
}
