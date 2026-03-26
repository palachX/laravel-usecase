<?php

declare(strict_types=1);

namespace App\UseCases\Orders;

use Spatie\LaravelData\Data;

final class StoreOrderDataOutput extends Data
{
    public function __construct(
        public readonly int $orderId,
        public readonly string $status,
    ) {}
}
