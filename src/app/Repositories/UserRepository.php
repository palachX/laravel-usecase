<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Contracts\UserRepositoryInterface;
use Illuminate\Support\Collection;

class UserRepository implements UserRepositoryInterface
{
    /**
     * @return Collection<int, User>
     */
    public function fetchListActive(): Collection
    {
        /** @var Collection<int, User> */
        return User::query()->whereActive()->get();
    }
}
