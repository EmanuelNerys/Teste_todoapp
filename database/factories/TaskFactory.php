<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    public function definition(): array
    {
        return [
            'titulo' => $this->faker->sentence,
            'descricao' => $this->faker->paragraph,
            'status' => 'pendente',
            'data_conclusao' => now()->addDays(3),
            'hora_conclusao' => '14:00',
            'prioridade' => 'baixa',
            'user_id' => 1, // ou crie dinamicamente com User::factory()
        ];
    }
}
