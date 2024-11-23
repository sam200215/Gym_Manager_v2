<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cliente;

class ClienteSeeder extends Seeder
{
    public function run()
    {
        // Generar 50 clientes ficticios
        Cliente::factory()->count(20)->create();
    }
}
