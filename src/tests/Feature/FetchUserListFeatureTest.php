<?php

declare(strict_types=1);

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Kirschbaum\OpenApiValidator\ValidatesOpenApiSpec;
use Tests\TestCase;

class FetchUserListFeatureTest extends TestCase
{
    use RefreshDatabase;
    use ValidatesOpenApiSpec;

    public function testFetchUserList(): void
    {
        $user = User::factory()->create();
        User::factory()->createMany(3);

        $response = $this
            ->actingAs($user)
            ->getJson('/api/users');

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'data' => [
                '*' => [
                    'id',
                    'name',
                    'is_active',
                ],
            ],
        ]);
    }
}
