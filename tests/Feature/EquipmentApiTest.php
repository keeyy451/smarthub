<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Equipment;

class EquipmentApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_checkout_equipment()
    {
        $user = User::factory()->create();
        $equipment = Equipment::create(['name' => 'Laptop', 'description' => 'Test', 'status' => 'available']);

        $response = $this->actingAs($user, 'sanctum')->postJson("/api/equipment/{$equipment->id}/checkout");

        $response->assertStatus(200)
                 ->assertJsonPath('message', 'Equipment checked out successfully');

        $this->assertDatabaseHas('equipment', [
            'id' => $equipment->id,
            'status' => 'checked_out'
        ]);
        
        $this->assertDatabaseHas('bookings', [
            'user_id' => $user->id,
            'equipment_id' => $equipment->id,
            'status' => 'active'
        ]);
    }

    public function test_user_can_checkin_equipment()
    {
        $user = User::factory()->create();
        $equipment = Equipment::create(['name' => 'Laptop', 'description' => 'Test', 'status' => 'checked_out']);
        $equipment->bookings()->create(['user_id' => $user->id, 'checkout_time' => now(), 'status' => 'active']);

        $response = $this->actingAs($user, 'sanctum')->postJson("/api/equipment/{$equipment->id}/checkin");

        $response->assertStatus(200)
                 ->assertJsonPath('message', 'Equipment checked in successfully');

        $this->assertDatabaseHas('equipment', [
            'id' => $equipment->id,
            'status' => 'available'
        ]);
    }
}
