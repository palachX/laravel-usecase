<?php

declare(strict_types=1);

namespace App\UseCases\Orders;

use App\Enums\OrderStatus;
use App\Models\Order;
use App\Repositories\Contracts\OrderRepositoryInterface;

final readonly class StoreOrderHandler
{
    public function __construct(
        private OrderRepositoryInterface $orders
    ) {}

    public function handle(StoreOrderDataInput $input): StoreOrderDataOutput
    {
        $order = new Order([
            'user_id' => $input->user->id,
            'status' => OrderStatus::PENDING->value,
            'total_amount' => 20.00,
        ]);

        $orderSaved = $this->orders->save($order);

        return new StoreOrderDataOutput(
            orderId: $orderSaved->id,
            status: $orderSaved->status
        );
    }
}
