<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Trabajador>
 */
class TrabajadorFactory extends Factory
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
            'nss' => $this->faker->unique()->regexify('[0-9]{11}'),
            'rfc' => $this->faker->unique()->regexify('[A-Z]{4}[0-9]{6}[A-Z0-9]{3}'),
            'curp' => $this->faker->unique()->regexify('[A-Z]{4}[0-9]{6}[HM][A-Z]{5}[0-9A-Z]{2}'),
            'telefono' => $this->faker->numerify('###########'),
            'email' => $this->faker->unique()->safeEmail(),
            'direccion' => $this->faker->address(),
            'proyecto_id' => $this->faker->optional()->numberBetween(1, 5),
            'deleted_at' => null,
        ];
    }
}
