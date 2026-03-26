<?php

declare(strict_types=1);

namespace App\Repositories\Contracts;

use App\Models\Order;
use Illuminate\Support\Collection;

interface OrderRepositoryInterface
{
    public function save(Order $order): Order;

    public function findById(int $id): ?Order;

    /**
     * @return Collection<array-key, Order>
     */
    public function findByUserId(int $userId): Collection;
}
