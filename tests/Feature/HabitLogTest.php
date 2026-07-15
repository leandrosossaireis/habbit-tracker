<?php

namespace Tests\Feature;

use App\Models\Habit;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HabitLogTest extends TestCase
{
    use RefreshDatabase;

    public function test_creates_a_habit_log_when_a_user_marks_a_habit_as_completed(): void
    {
        $user = User::factory()->create();
        $habit = Habit::factory()->create(['user_id' => $user->id]);

        $response = $this->actingAs($user)
            ->post(route('habits.logs.store', $habit));

        $response->assertRedirect(route('dashboard'))
            ->assertSessionHas('success', 'Hábito marcado como concluído hoje!');

        $this->assertDatabaseHas('habit_logs', [
            'user_id' => $user->id,
            'habit_id' => $habit->id,
            'completed_at' => now()->toDateString(),
        ]);
    }
}
