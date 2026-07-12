<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property-read int $id
 * @property-read string $title
 * @property-read string $description
 * @property-read string $icon
 */
#[Fillable(['title', 'description', 'icon'])]
class Service extends Model
{
    use HasFactory;
}
