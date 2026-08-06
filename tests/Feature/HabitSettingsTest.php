<?php

namespace Tests\Feature;

use App\Models\Habit;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HabitSettingsTest extends TestCase
{
    use RefreshDatabase;

    public function test_settings_page_renders_a_complete_delete_form_for_each_habit(): void
    {
        $user = User::factory()->create();
        $habit = Habit::factory()->create(['user_id' => $user->id]);

        $response = $this->actingAs($user)
            ->get(route('habits.settings'));

        $response->assertOk();
        $this->assertStringContainsString('<form action="' . route('habits.destroy', $habit) . '"', $response->getContent());
        $this->assertStringContainsString('</form>', $response->getContent());
    }
}
