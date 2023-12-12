<?php

namespace App\Models\Traits;

use Illuminate\Database\Eloquent\Builder;

trait PostScopes
{
    // Local Scope = write reusable query on model
    public function scopePublished(Builder $query): void
    {
        $query->where('is_published', true);
    }
    // Local Scope = write reusable query on model
    public function scopeWithUser(Builder $query): void
    {
        $query->join('users', 'posts.user_id', '=', 'users.id')
        ->select('posts.*', 'users.name as author_name');
    }
    // Dynamic scopes allow you to specify the condition that you want to filter by
    // Flexibility to change the conditions at run time without need to modify your code
    public function scopePublishedByUser(Builder $query, $userId, $bool): void
    {  //Post::publishedByUser($userId,$bool)->withUser()->get();
        $query->where('user_id', $userId)
        ->where('is_published', $bool);
    }
}

