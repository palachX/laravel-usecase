<?php

declare(strict_types=1);

namespace App\EloquentBuilders;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;

/**
 * @extends Builder<User>
 */
final class UserBuilder extends Builder
{
    public function whereActive(bool $isActive = true): self
    {
        return $this->where('is_active', $isActive);
    }
}
