<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Kirschbaum\OpenApiValidator\ValidatesOpenApiSpec;
use Tests\TestCase;

class StoreOrderFeatureTest extends TestCase
{
    use RefreshDatabase;
    use ValidatesOpenApiSpec;

    public function testStoreOrder(): void
    {
        $user = User::factory()->create();

        $payload = [
            'items' => [
                ['id' => 10, 'qty' => 2],
                ['id' => 15, 'qty' => 1],
            ],
        ];

        $response = $this->actingAs($user)
            ->postJson('/api/orders', $payload);

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'order_id',
            'status',
        ]);

        $this->assertDatabaseHas('orders', [
            'user_id' => $user->id,
        ]);
    }
}
