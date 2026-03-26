<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Order;
use App\Repositories\Contracts\OrderRepositoryInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

/**
 * @extends Builder<Order>
 */
class EloquentOrderRepository extends Builder implements OrderRepositoryInterface
{
    public function save(Order $order): Order
    {
        $order->save();

        return $order;
    }

    public function findById(int $id): ?Order
    {
        return Order::find($id);
    }

    /**
     * @return Collection<array-key, Order>
     */
    public function findByUserId(int $userId): Collection
    {
        return Order::where('user_id', $userId)->get();
    }
}
