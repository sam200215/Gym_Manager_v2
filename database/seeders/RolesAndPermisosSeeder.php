<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Rol;
use App\Models\Permiso;
use App\Models\Rolporpermiso;

class RolesAndPermisosSeeder extends Seeder {
    public function run(): void {
        // Crear roles básicos
        $roles = [
            [
                'nombre' => 'Administrador',
                'descripcion' => 'Control total del sistema'
            ],
            [
                'nombre' => 'Gerente',
                'descripcion' => 'Gestión general del gimnasio'
            ],
            [
                'nombre' => 'Recepcionista',
                'descripcion' => 'Gestión de pagos y clientes'
            ],
            [
                'nombre' => 'Entrenador',
                'descripcion' => 'Seguimiento de clientes'
            ]
        ];

        foreach ( $roles as $rol ) {
            Rol::firstOrCreate( [ 'nombre' => $rol[ 'nombre' ] ], $rol );
        }

        // Crear permisos
        $permisos = [
            // Sistema y Usuarios
            [ 'nombre' => 'gestionar-roles', 'descripcion' => 'Gestionar roles del sistema' ],//
            [ 'nombre' => 'gestionar-usuarios', 'descripcion' => 'Gestionar usuarios del sistema' ],

            // Clientes
            [ 'nombre' => 'crear-clientes', 'descripcion' => 'Crear nuevos clientes' ],
            [ 'nombre' => 'editar-clientes', 'descripcion' => 'Editar información de clientes' ],
            [ 'nombre' => 'ver-clientes', 'descripcion' => 'Ver listado de clientes' ],
            [ 'nombre' => 'eliminar-clientes', 'descripcion' => 'Eliminar clientes' ],

            // Membresías
            [ 'nombre' => 'crear-membresias', 'descripcion' => 'Crear nuevas membresías' ],
            [ 'nombre' => 'editar-membresias', 'descripcion' => 'Editar membresías' ],
            [ 'nombre' => 'ver-membresias', 'descripcion' => 'Ver listado de membresías' ],
            [ 'nombre' => 'eliminar-membresias', 'descripcion' => 'Eliminar membresías' ],

            // Pagos
            [ 'nombre' => 'crear-pagos', 'descripcion' => 'Crear nuevos pagos' ],
            [ 'nombre' => 'editar-pagos', 'descripcion' => 'Editar pagos' ],
            [ 'nombre' => 'ver-pagos', 'descripcion' => 'Ver listado de pagos' ],
            [ 'nombre' => 'eliminar-pagos', 'descripcion' => 'Eliminar pagos' ],
            [ 'nombre' => 'generar-reportes', 'descripcion' => 'Generar reportes de pagos' ],

            // Empleados
            [ 'nombre' => 'crear-empleados', 'descripcion' => 'Crear nuevos empleados' ],
            [ 'nombre' => 'editar-empleados', 'descripcion' => 'Editar información de empleados' ],
            [ 'nombre' => 'ver-empleados', 'descripcion' => 'Ver listado de empleados' ],
            [ 'nombre' => 'eliminar-empleados', 'descripcion' => 'Eliminar empleados' ],

            // Bitácora
            [ 'nombre' => 'ver-bitacora', 'descripcion' => 'Ver registros de bitácora' ],
        ];

        foreach ( $permisos as $permiso ) {
            Permiso::firstOrCreate( [ 'nombre' => $permiso[ 'nombre' ] ], $permiso );
        }

        // Obtener roles
        $rolAdmin = Rol::where( 'nombre', 'Administrador' )->first();
        $rolGerente = Rol::where( 'nombre', 'Gerente' )->first();
        $rolRecepcionista = Rol::where( 'nombre', 'Recepcionista' )->first();
        $rolEntrenador = Rol::where( 'nombre', 'Entrenador' )->first();

        // Administrador: todos los permisos
        foreach ( Permiso::all() as $permiso ) {
            Rolporpermiso::firstOrCreate( [
                'rol_id' => $rolAdmin->id,
                'permiso_id' => $permiso->id
            ] );
        }

        // Permisos Gerente
        $permisosGerente = [
            'ver-empleados',
            'crear-empleados',
            'editar-empleados',
            'ver-clientes',
            'crear-clientes',
            'editar-clientes',
            'ver-membresias',
            'crear-membresias',
            'editar-membresias',
            'ver-pagos',
            'crear-pagos',
            'editar-pagos',
            'generar-reportes',
            'ver-bitacora'
        ];

        // Permisos Recepcionista
        $permisosRecepcionista = [
            'ver-clientes',
            'crear-clientes',
            'ver-membresias',
            'ver-pagos',
            'crear-pagos'
        ];

        // Permisos Entrenador
        $permisosEntrenador = [ 'ver-clientes' ];

        // Asignar permisos a roles
        foreach ( $permisosGerente as $nombrePermiso ) {
            $permiso = Permiso::where( 'nombre', $nombrePermiso )->first();
            if ( $permiso ) {
                Rolporpermiso::firstOrCreate( [
                    'rol_id' => $rolGerente->id,
                    'permiso_id' => $permiso->id
                ] );
            }
        }

        foreach ( $permisosRecepcionista as $nombrePermiso ) {
            $permiso = Permiso::where( 'nombre', $nombrePermiso )->first();
            if ( $permiso ) {
                Rolporpermiso::firstOrCreate( [
                    'rol_id' => $rolRecepcionista->id,
                    'permiso_id' => $permiso->id
                ] );
            }
        }

        foreach ( $permisosEntrenador as $nombrePermiso ) {
            $permiso = Permiso::where( 'nombre', $nombrePermiso )->first();
            if ( $permiso ) {
                Rolporpermiso::firstOrCreate( [
                    'rol_id' => $rolEntrenador->id,
                    'permiso_id' => $permiso->id
                ] );
            }
        }
    }
}
