<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property-read int $id
 * @property-read string $project_id
 * @property-read string $image_url
 * @property-read Project $project
 */
#[Fillable(['project_id', 'image_url'])]
class ProjectImage extends Model
{
    use HasFactory;

    /**
     * Get the project that owns the image.
     *
     * @return BelongsTo<Project, $this>
     */
    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }
}
