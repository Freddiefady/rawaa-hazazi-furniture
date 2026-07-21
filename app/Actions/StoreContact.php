<?php

declare(strict_types=1);

namespace App\Actions;

use App\Models\Message;

final class StoreContact
{
    /**
     * Handle Store Contact Message.
     *
     * @param  array<string, mixed>  $request
     */
    public function handle(array $request): Message
    {
        return Message::query()->create($request);
    }
}
