<?php
namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;

class ServicesTest extends TestCase
{

    public function test_the_application_returns_a_successful_response(): void
    {
            $user = User::factory()->create();

        $response = $this->actingAs($user)
                         ->withSession(['banned' => false])
                         ->get('/en');

        $response->assertStatus(200);
    }
}
