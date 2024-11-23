<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ClienteFactory extends Factory
{
    public function definition()
    {
        return [
            'nombre_completo' => $this->faker->name,
            'dni' => $this->faker->unique()->numberBetween(10000000, 99999999),
            'telefono' => $this->faker->phoneNumber,
            'direccion' => $this->faker->address,
            'email' => $this->faker->unique()->safeEmail,
            'fecha_nacimiento' => $this->faker->date('Y-m-d', '2005-12-31'), // Fecha antes de 2005
            'genero' => $this->faker->randomElement(['Masculino', 'Femenino']),
            'contacto_emergencia' => $this->faker->name,
            'telefono_emergencia' => $this->faker->phoneNumber,
            'condiciones_medicas' => $this->faker->optional()->sentence,
            'fecha_registro' => now(), // Fecha actual
            'activo' => $this->faker->boolean(80), // 80% de probabilidades de ser true
        ];
    }
}
