<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property-read string $id
 * @property-read string $name
 * @property-read string $email
 * @property-read string $phone
 * @property-read string $service_type
 * @property-read string $message
 */
#[Fillable(['name', 'email', 'phone', 'service_type', 'message'])]
class Message extends Model
{
    use HasFactory;
}
