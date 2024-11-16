<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Crear usuario Administrador
        User::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin User',
                'password' => bcrypt('password'),
                'rol_id' => 1, // Asignar rol de administrador
            ]
        );

        // Crear usuario Gerente
        User::firstOrCreate(
            ['email' => 'gerente@example.com'],
            [
                'name' => 'Gerente User',
                'password' => bcrypt('password'),
                'rol_id' => 2, // Asignar rol de gerente
            ]
        );

        // Crear usuario Empleado
        User::firstOrCreate(
            ['email' => 'empleado@example.com'],
            [
                'name' => 'Empleado User',
                'password' => bcrypt('password'),
                'rol_id' => 3, // Asignar rol de empleado
            ]
        );
    }
}