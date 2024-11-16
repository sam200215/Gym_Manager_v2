<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Rol;
use App\Models\Permiso;
use App\Models\Rolporpermiso;

class RolesAndPermisosSeeder extends Seeder
{
    public function run(): void
    {
        // Crear roles básicos
        $roles = [
            [
                'nombre' => 'Administrador',
                'descripcion' => 'Control total del sistema'
            ],
            [
                'nombre' => 'Gerente',
                'descripcion' => 'Gestión de empleados y clientes'
            ],
            [
                'nombre' => 'Empleado',
                'descripcion' => 'Operaciones básicas'
            ]
        ];

        foreach ($roles as $rol) {
            Rol::firstOrCreate(['nombre' => $rol['nombre']], $rol);
        }

        // Crear permisos
        $permisos = [
            // Permisos de roles
            ['nombre' => 'gestionar-roles', 'descripcion' => 'Gestionar roles del sistema'],
            
            // Permisos de clientes
            ['nombre' => 'gestionar-clientes', 'descripcion' => 'Gestionar clientes'],
            ['nombre' => 'ver-clientes', 'descripcion' => 'Ver listado de clientes'],
            
            // Permisos de membresías
            ['nombre' => 'gestionar-membresias', 'descripcion' => 'Gestionar membresías'],
            
            // Permisos de empleados
            ['nombre' => 'gestionar-empleados', 'descripcion' => 'Gestionar empleados'],
            
            // Permisos de pagos
            ['nombre' => 'gestionar-pagos', 'descripcion' => 'Gestionar pagos'],
            ['nombre' => 'ver-pagos', 'descripcion' => 'Ver pagos'],
            
            // Permisos de bitácora
            ['nombre' => 'ver-bitacora', 'descripcion' => 'Ver bitácora de cambios']
        ];

        foreach ($permisos as $permiso) {
            Permiso::firstOrCreate(['nombre' => $permiso['nombre']], $permiso);
        }

        // Asignar permisos a roles
        $rolAdmin = Rol::where('nombre', 'Administrador')->first();
        $rolGerente = Rol::where('nombre', 'Gerente')->first();
        $rolEmpleado = Rol::where('nombre', 'Empleado')->first();

        // Administrador tiene todos los permisos
        foreach (Permiso::all() as $permiso) {
            Rolporpermiso::firstOrCreate([
                'rol_id' => $rolAdmin->id,
                'permiso_id' => $permiso->id
            ]);
        }

        // Gerente tiene permisos específicos
        $permisosGerente = ['gestionar-clientes', 'ver-clientes', 'gestionar-empleados', 'gestionar-membresias', 'gestionar-pagos', 'ver-pagos'];
        foreach ($permisosGerente as $nombrePermiso) {
            $permiso = Permiso::where('nombre', $nombrePermiso)->first();
            Rolporpermiso::firstOrCreate([
                'rol_id' => $rolGerente->id,
                'permiso_id' => $permiso->id
            ]);
        }

        // Empleado tiene permisos básicos
        $permisosEmpleado = ['ver-clientes', 'ver-pagos'];
        foreach ($permisosEmpleado as $nombrePermiso) {
            $permiso = Permiso::where('nombre', $nombrePermiso)->first();
            Rolporpermiso::firstOrCreate([
                'rol_id' => $rolEmpleado->id,
                'permiso_id' => $permiso->id
            ]);
        }
    }
}