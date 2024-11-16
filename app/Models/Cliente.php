<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\RegistraBitacora;
/**
 * Class Cliente
 *
 * @property $id
 * @property $usuario_id
 * @property $nombre_completo
 * @property $dni
 * @property $telefono
 * @property $direccion
 * @property $created_at
 * @property $updated_at
 *
 * @property User $user
 * @property Pago[] $pagos
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Cliente extends Model
{
    use RegistraBitacora;
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['usuario_id', 'nombre_completo', 'dni', 'telefono', 'direccion'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'usuario_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pagos()
    {
        return $this->hasMany(\App\Models\Pago::class, 'id', 'cliente_id');
    }
    
}
