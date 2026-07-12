<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;

/**
 * @property-read int $id
 * @property-read int $title
 * @property-read int $description
 * @property-read string $materials
 * @property-read string $area
 * @property-read string $cover_image
 * @property-read  Category $this
 * @property-read  Collection<int, ProjectImage> $images
 * @property-read  Collection<int, Category> $categories
 */
#[Fillable(['title', 'description', 'category_id', 'materials', 'area', 'cover_image'])]
class Project extends Model
{
    use HasFactory;

    /**
     * Get the category this project belongs to.
     *
     * @return BelongsTo<Category, $this>
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the images for the project.
     *
     * @return HasMany<ProjectImage, $this>
     */
    public function images(): HasMany
    {
        return $this->hasMany(ProjectImage::class);
    }

    /**
     * Get the categories for the project
     *
     * @return HasMany<Category, $this>
     */
    public function categories(): HasMany
    {
        return $this->hasMany(Category::class);
    }

    /**
     * Resolve cover_image to a full URL regardless of whether it is
     * a local storage path (uploaded via admin) or an external URL (seeded data).
     */
    protected function coverImage(): Attribute
    {
        return Attribute::make(
            get: function (?string $value) {
                if (! $value) {
                    return null;
                }

                return str_starts_with($value, 'http') ? $value : Storage::disk('public')->url($value);
            }
        );
    }
}
