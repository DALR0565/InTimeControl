<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Proyecto>
 */
class ProyectoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->name(),
            'registro_patronal' => $this->faker->bothify('##??-####'),
            'categoria' => $this->faker->randomElement(['Administrativo', 'Operativo', 'Gerencial', 'Tecnico']),
            'direccion' => $this->faker->address(),
            'fecha_inicio' => $this->faker->date(),
            'fecha_fin' => $this->faker->date(),
            'monto_contrato' => $this->faker->randomFloat(2, 10000, 100000),
        ];
    }
}
