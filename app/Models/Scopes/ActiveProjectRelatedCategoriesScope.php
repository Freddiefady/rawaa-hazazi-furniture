<?php

declare(strict_types=1);

namespace App\Models\Scopes;

use App\Models\Project;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

/**
 * @implements Scope<Project>
 */
final class ActiveProjectRelatedCategoriesScope implements Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     */
    public function apply(Builder $builder, Model $model): void
    {
        $builder->whereHas('categories', function (Builder $query): void {
            $query->where('status', 1);
        });
    }
}
