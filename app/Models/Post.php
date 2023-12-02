<?php

namespace App\Models;

use App\Models\Scopes\PublishedOnThirtyDaysScope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Prunable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, SoftDeletes, Prunable;

    protected $guarded = [];

    // protected static function booted() // life cycle 
    // {   // addGlobalScope 
    //     static::addGlobalScope(new PublishedOnThirtyDaysScope);
    // }

    public function prunable(): Builder
    {// using Prunable Trait in Model is grate way to remove outdated data from db
        return static::where('deleted_at', '<=', now()->subMonth());
    }
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
