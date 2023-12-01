<?php

namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class PublishedOnThirtyDaysScope implements Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     */
    public function apply(Builder $builder, Model $model): void
    {          // where its created within thirty and is published
        $builder->where('created_at', '>=', now()->subDays(30))
                ->where('is_published', true);
    }
}
