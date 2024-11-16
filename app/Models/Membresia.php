<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\RegistraBitacora;
/**
 * Class Membresia
 *
 * @property $id
 * @property $tipo
 * @property $descripcion
 * @property $costo
 * @property $duracion
 * @property $created_at
 * @property $updated_at
 *
 * @property Pagodetall[] $pagodetalls
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Membresia extends Model
{
    use RegistraBitacora;
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['tipo', 'descripcion', 'costo', 'duracion'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pagodetalls()
    {
        return $this->hasMany(\App\Models\Pagodetall::class, 'id', 'membresia_id');
    }
    
}
