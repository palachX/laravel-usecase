<?php

declare(strict_types=1);

namespace App\UseCases\FetchUserList;

use App\Models\User;
use App\Repositories\Contracts\UserRepositoryInterface;
use Illuminate\Support\Collection;

final readonly class FetchUseListHandler
{
    public function __construct(
        private UserRepositoryInterface $userRepository
    ) {}

    public function handle(): FetchUserListDataOutput
    {
        /** @var Collection<int, UserData> $users */
        $users = $this->userRepository->fetchListActive()
            ->map(fn (User $user) => new UserData(
                id: $user->id,
                name: $user->name,
                isActive: $user->is_active
            ));

        return new FetchUserListDataOutput(
            data: $users
        );
    }
}
