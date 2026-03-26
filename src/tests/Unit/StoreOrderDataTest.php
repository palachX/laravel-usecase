<?php

declare(strict_types=1);

namespace Tests\Unit;

use App\Models\User;
use App\UseCases\StoreOrder\StoreOrderDataInput;
use App\UseCases\StoreOrder\StoreOrderDataOutput;
use PHPUnit\Framework\Attributes\DataProvider;
use Tests\TestCase;

class StoreOrderDataTest extends TestCase
{
    public static function storeOrderDataInputProvider(): iterable
    {
        yield 'basic input with items' => [
            'data' => [
                'user' => new User(['id' => 1]),
                'items' => [
                    ['id' => 10, 'qty' => 2],
                    ['id' => 15, 'qty' => 1],
                ],
            ],
            'expected' => new StoreOrderDataInput(
                user: new User(['id' => 1]),
                items: [
                    ['id' => 10, 'qty' => 2],
                    ['id' => 15, 'qty' => 1],
                ]
            ),
        ];

        yield 'empty items array' => [
            'data' => [
                'user' => new User(['id' => 99]),
                'items' => [],
            ],
            'expected' => new StoreOrderDataInput(
                user: new User(['id' => 99]),
                items: []
            ),
        ];

        yield 'complex items structure' => [
            'data' => [
                'user' => new User(['id' => 55]),
                'items' => [
                    ['id' => 100, 'qty' => 1, 'price' => 10.99, 'name' => 'Product A'],
                    ['id' => 200, 'qty' => 3, 'price' => 5.50, 'name' => 'Product B'],
                    ['id' => 300, 'qty' => 2, 'price' => 15.00, 'name' => 'Product C'],
                ],
            ],
            'expected' => new StoreOrderDataInput(
                user: new User(['id' => 55]),
                items: [
                    ['id' => 100, 'qty' => 1, 'price' => 10.99, 'name' => 'Product A'],
                    ['id' => 200, 'qty' => 3, 'price' => 5.50, 'name' => 'Product B'],
                    ['id' => 300, 'qty' => 2, 'price' => 15.00, 'name' => 'Product C'],
                ]
            ),
        ];
    }

    #[DataProvider('storeOrderDataInputProvider')]
    public function testStoreOrderDataInputFromArray(array $data, StoreOrderDataInput $expected): void
    {
        $actual = StoreOrderDataInput::validateAndCreate($data);
        $this->assertEquals($expected, $actual);
    }

    public static function storeOrderDataOutputProvider(): iterable
    {
        yield 'basic output with pending status' => [
            'data' => [
                'order_id' => 456,
                'status' => 'pending',
            ],
            'expected' => new StoreOrderDataOutput(
                orderId: 456,
                status: 'pending'
            ),
        ];

        yield 'output with completed status' => [
            'data' => [
                'order_id' => 789,
                'status' => 'completed',
            ],
            'expected' => new StoreOrderDataOutput(
                orderId: 789,
                status: 'completed'
            ),
        ];

        yield 'camel case input' => [
            'data' => [
                'order_id' => 123,
                'status' => 'processing',
            ],
            'expected' => new StoreOrderDataOutput(
                orderId: 123,
                status: 'processing'
            ),
        ];

        yield 'different statuses' => [
            'data' => [
                'order_id' => 555,
                'status' => 'shipped',
            ],
            'expected' => new StoreOrderDataOutput(
                orderId: 555,
                status: 'shipped'
            ),
        ];
    }

    #[DataProvider('storeOrderDataOutputProvider')]
    public function testStoreOrderDataOutputFromArray(array $data, StoreOrderDataOutput $expected): void
    {
        $actual = StoreOrderDataOutput::validateAndCreate($data);
        $this->assertEquals($expected, $actual);
    }
}
