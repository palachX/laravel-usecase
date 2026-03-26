<?php

declare(strict_types=1);

namespace App\UseCases\StoreOrder;

use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapName(SnakeCaseMapper::class)]
final class StoreOrderDataOutput extends Data
{
    public function __construct(
        public readonly int $orderId,
        public readonly string $status,
    ) {}
}
