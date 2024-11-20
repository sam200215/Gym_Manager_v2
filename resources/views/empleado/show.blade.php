@extends('layouts.app')

@section('template_title')
{{ __('Ver') }} Empleado
@endsection

@section('content')
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="float-left">
                        <span class="card-title"><i class="fas fa-user-tie"></i> {{ __('Ver Empleado') }}</span>
                    </div>
                    <div class="float-right">
                        <a class="btn btn-primary" href="{{ route('empleados.index') }}">
                            <i class="fas fa-arrow-left"></i> {{ __('Volver') }}
                        </a>
                    </div>
                </div>

                <div class="card-body bg-white">
                    <div class="row">
                        <!-- Información Personal -->
                        <div class="col-md-6">
                            <h4 class="mb-3">Información Personal</h4>
                            <div class="form-group mb-3">
                                <strong>Nombre Completo:</strong>
                                {{ $empleado->nombre_completo }}
                            </div>
                            <div class="form-group mb-3">
                                <strong>DNI:</strong>
                                {{ $empleado->dni }}
                            </div>
                            <div class="form-group mb-3">
                                <strong>Teléfono:</strong>
                                {{ $empleado->telefono }}
                            </div>
                            <div class="form-group mb-3">
                                <strong>Email:</strong>
                                {{ $empleado->email ?? 'No especificado' }}
                            </div>
                            <div class="form-group mb-3">
                                <strong>Dirección:</strong>
                                {{ $empleado->direccion ?? 'No especificada' }}
                            </div>
                            <div class="form-group mb-3">
                                <strong>Estado:</strong>
                                @if($empleado->activo)
                                <span class="badge bg-success">Activo</span>
                                @else
                                <span class="badge bg-danger">Inactivo</span>
                                @endif
                            </div>
                        </div>

                        <!-- Información Laboral -->
                        <div class="col-md-6">
                            <h4 class="mb-3">Información Laboral</h4>
                            <div class="form-group mb-3">
                                <strong>Cargo:</strong>
                                {{ $empleado->cargo }}
                            </div>
                            <div class="form-group mb-3">
                                <strong>Salario:</strong>
                                L. {{ number_format($empleado->salario, 2) }}
                            </div>
                            <div class="form-group mb-3">
                                <strong>Fecha de Contratación:</strong>
                                {{ $empleado->fecha_contratacion ? $empleado->fecha_contratacion->format('d/m/Y') : 'No especificada' }}
                            </div>
                            <div class="form-group mb-3">
                                <strong>Tipo de Contrato:</strong>
                                {{ $empleado->tipo_contrato }}
                            </div>
                            <div class="form-group mb-3">
                                <strong>Horario de Trabajo:</strong>
                                {{ $empleado->horario_trabajo ?? 'No especificado' }}
                            </div>
                            <div class="form-group mb-3">
                                <strong>Número de Seguro Social:</strong>
                                {{ $empleado->numero_seguro_social ?? 'No especificado' }}
                            </div>

                            <h4 class="mt-4 mb-3">Contacto de Emergencia</h4>
                            <div class="form-group mb-3">
                                <strong>Nombre:</strong>
                                {{ $empleado->contacto_emergencia ?? 'No especificado' }}
                            </div>
                            <div class="form-group mb-3">
                                <strong>Teléfono:</strong>
                                {{ $empleado->telefono_emergencia ?? 'No especificado' }}
                            </div>
                        </div>
                    </div>

                    <!-- Botones de Acción -->
                    <div class="mt-4">
                        <a href="{{ route('empleados.edit', $empleado->id) }}" class="btn btn-success">
                            <i class="fas fa-edit"></i> {{ __('Editar') }}
                        </a>
                        <form action="{{ route('empleados.destroy', $empleado->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"
                                onclick="return confirm('¿Está seguro de eliminar este empleado?')">
                                <i class="fas fa-trash"></i> {{ __('Eliminar') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection