<?php

namespace App\Models;

use App\Models\Traits\PostScopes;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Prunable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, SoftDeletes, Prunable, PostScopes;

    protected $guarded = [];

    public function prunable(): Builder
    {// using Prunable Trait in Model is grate way to remove outdated data from db
        return static::where('deleted_at', '<=', now()->subMonth());
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class /** , 'user_id', 'id'  */);
    }

    public function tags(): BelongsToMany
    {   // post_tag pivot table will have many tags associated to many posts
        return $this->belongsToMany(Tag::class, 'post_tag', 'post_id', 'tag_id');
    }

}
