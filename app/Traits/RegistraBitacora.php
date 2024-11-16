<?php
// app/Traits/RegistraBitacora.php

namespace App\Traits;

use App\Models\Bitacoracambio;

trait RegistraBitacora
{
    protected static function bootRegistraBitacora()
    {
        // Registrar creación
        static::created(function ($model) {
            self::registrarCambio('CREATE', $model);
        });

        // Registrar actualización
        static::updated(function ($model) {
            self::registrarCambio('UPDATE', $model);
        });

        // Registrar eliminación
        static::deleted(function ($model) {
            self::registrarCambio('DELETE', $model);
        });
    }

    protected static function registrarCambio($accion, $model)
    {
        try {
            Bitacoracambio::create([
                'usuario' => auth()->user()->name ?? 'Sistema',
                'tabla' => $model->getTable(),
                'accion' => $accion,
                'datos_antiguos' => $accion !== 'CREATE' ? json_encode($model->getOriginal()) : null,
                'datos_nuevos' => $accion !== 'DELETE' ? json_encode($model->getAttributes()) : null,
                'ip' => request()->ip()
            ]);
        } catch (\Exception $e) {
            \Log::error('Error al registrar en bitácora: ' . $e->getMessage());
        }
    }
}