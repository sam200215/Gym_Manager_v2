<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Bitacoracambio
 *
 * @property $id
 * @property $usuario
 * @property $tabla
 * @property $accion
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Bitacoracambio extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'bitacoracambios';
    
    /**
     * Número de elementos por página para la paginación
     */
    protected $perPage = 20;

    /**
     * Los atributos que son asignables en masa.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'usuario',
        'tabla',
        'accion',
        'datos_antiguos',
        'datos_nuevos',
        'ip'
    ];

    /**
     * Los atributos que deben ser convertidos.
     *
     * @var array
     */
    protected $casts = [
        'datos_antiguos' => 'array',
        'datos_nuevos' => 'array',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    /**
     * Obtiene el tipo de badge según la acción
     */
    public function getBadgeClass()
    {
        return match($this->accion) {
            'CREATE' => 'success',
            'UPDATE' => 'warning',
            'DELETE' => 'danger',
            default => 'info'
        };
    }
}
