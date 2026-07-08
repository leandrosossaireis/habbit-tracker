<?php

namespace Database\Factories;

use App\Models\Habit;
use Illuminate\Database\Eloquent\Factories\Factory;
use app\Models\User;
/**
 * @extends Factory<Habit>
 */
class HabitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {   
        $habits = [
            'Exercício',
            'Meditação',
            'Leitura',
            'Registro Diário',
            'Alimentação Saudável',
            'Rotina de Sono',
            'Gestão de Tempo',
            'Aprender uma Nova Habilidade',
            'Prática de Gratidão',
            'Desintoxicação Digital'
        ];
        return [
            'user_id' => 1,
            'name' => $this->faker->unique()->randomElement($habits),
        ];
    }
}
