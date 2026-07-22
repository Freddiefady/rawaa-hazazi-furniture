<?php

declare(strict_types=1);

namespace App\Enums;

enum StatusEnum: int
{
    case ACTIVE = 1;
    case INACTIVE = 0;

    public function label(): string
    {
        return match ($this) {
            self::ACTIVE => 'مفعّلة',
            self::INACTIVE => 'غير مفعّلة',
        };
    }

    public function color(): string
    {
        return match ($this) {
            self::INACTIVE => 'bg-slate-100 text-slate-500',
            self::ACTIVE => 'bg-green-50 text-green-700',
        };
    }
}
