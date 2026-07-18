<?php

declare(strict_types=1);

namespace App\Models;

use Database\Factories\PostFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

/**
 * @property-read string $id
 * @property-read string $title
 * @property-read string $content
 * @property-read string $cover_image
 */
#[Fillable(['title', 'content', 'cover_image'])]
final class Post extends Model
{
    /** @use HasFactory<PostFactory> */
    use HasFactory;

    /**
     * Resolve cover_image to a full URL regardless of whether it is
     * a local storage path (uploaded via admin) or an external URL (seeded data).
     *
     * @return Attribute<string|null, never>
     */
    protected function coverImage(): Attribute
    {
        return Attribute::make(
            get: function (mixed $value) {
                if (! is_string($value)) {
                    return null;
                }

                return str_starts_with($value, 'http') ? $value : Storage::disk('public')->url($value);
            }
        );
    }
}
