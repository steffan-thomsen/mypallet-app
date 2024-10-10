<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\TransportUnit;

class TransportUnitTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_create_transport_unit()
    {
        $data = [
            'name' => 'Test Trailer',
            'type' => 'trailer',
        ];

        $response = $this->postJson('/api/transport-units', $data);

        $response->assertStatus(201)
                 ->assertJson([
                     'name' => 'Test Trailer',
                     'type' => 'trailer',
                 ]);

        $this->assertDatabaseHas('transport_units', $data);
    }

    public function test_can_list_transport_units()
    {
        TransportUnit::factory()->count(3)->create();

        $response = $this->getJson('/api/transport-units');

        $response->assertStatus(200)
                 ->assertJsonCount(3);
    }

    public function test_can_filter_transport_units_by_type()
    {
        TransportUnit::factory()->create(['type' => 'trailer']);
        TransportUnit::factory()->create(['type' => 'truck']);

        $response = $this->getJson('/api/transport-units/trailer');
        $response->assertStatus(200)
                 ->assertJsonCount(1)
                 ->assertJsonFragment(['type' => 'trailer']);

        $response = $this->getJson('/api/transport-units/truck');
        $response->assertStatus(200)
                 ->assertJsonCount(1)
                 ->assertJsonFragment(['type' => 'truck']);
    }

    public function test_can_search_transport_units()
    {
        TransportUnit::factory()->create(['name' => 'Test Trailer']);
        TransportUnit::factory()->create(['name' => 'Another Truck']);

        $response = $this->getJson('/api/search-transport-units?query=Test');
        $response->assertStatus(200)
                 ->assertJsonCount(1)
                 ->assertJsonFragment(['name' => 'Test Trailer']);
    }
}
