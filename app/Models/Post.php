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

    public function scopePublished(Builder $query)
    {
        return $query->where('is_published', true);
    }
              
}
