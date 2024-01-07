<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contactos>
 */
class ContactosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre_contacto' => fake()->name(),
            'apellido_contacto' => fake()->name(),
            'telefono_contacto' => fake()->phoneNumber()
        ];
    }
}
