<?php

declare(strict_types=1);

namespace App\UseCases\Orders;

use App\Models\User;
use Spatie\LaravelData\Attributes\FromAuthenticatedUser;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapName(SnakeCaseMapper::class)]
final class StoreOrderDataInput extends Data
{
    /**
     * @param  array<mixed>  $items
     */
    public function __construct(
        #[FromAuthenticatedUser]
        public readonly User $user,
        public readonly array $items,
    ) {}
}
