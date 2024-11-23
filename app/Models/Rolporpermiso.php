<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\RegistraBitacora;

/**
 * Class Rolporpermiso
 *
 * @property $id
 * @property $rol_id
 * @property $permiso_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Permiso $permiso
 * @property Rol $rol
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Rolporpermiso extends Model
{
    use RegistraBitacora;
    
    protected $perPage = 10;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['rol_id', 'permiso_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function permiso()
    {
        return $this->belongsTo(\App\Models\Permiso::class, 'permiso_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function rol()
    {
        return $this->belongsTo(\App\Models\Rol::class, 'rol_id', 'id');
    }
    
}
