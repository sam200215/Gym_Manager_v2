<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Primero ejecutar el seeder de roles y permisos
        $this->call([
            RolesAndPermisosSeeder::class,
        ]);

        // Después crear los usuarios
        User::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin User',
                'password' => bcrypt('3Xho7Tn!cn'),
                'rol_id' => 1,
            ]
        );

        User::firstOrCreate(
            ['email' => 'gerente@example.com'],
            [
                'name' => 'Gerente User',
                'password' => bcrypt('3Xho7Tn!cn'),
                'rol_id' => 2,
            ]
        );

        User::firstOrCreate(
            ['email' => 'recepcion@example.com'],
            [
                'name' => 'Recepcionista User',
                'password' => bcrypt('3Xho7Tn!cn'),
                'rol_id' => 3,
            ]
        );

        User::firstOrCreate(
            ['email' => 'entrenador@example.com'],
            [
                'name' => 'Entrenador User',
                'password' => bcrypt('3Xho7Tn!cn'),
                'rol_id' => 2,
            ]
        );
    }
}