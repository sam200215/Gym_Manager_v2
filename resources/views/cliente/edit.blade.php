<!-- resources/views/cliente/edit.blade.php -->
@extends('layouts.app')

@section('template_title')
    {{ __('Editar') }} Cliente
@endsection

@section('content')
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="float-left">
                        <span class="card-title"><i class="fas fa-user-edit"></i> {{ __('Editar Cliente') }}</span>
                    </div>
                    <div class="float-right">
                        <a class="btn btn-primary" href="{{ route('clientes.index') }}">
                            <i class="fas fa-arrow-left"></i> {{ __('Volver') }}
                        </a>
                    </div>
                </div>
                <div class="card-body bg-white">
                    <form method="POST" action="{{ route('clientes.update', $cliente->id) }}" role="form" enctype="multipart/form-data">
                        {{ method_field('PATCH') }}
                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="nombre_completo">Nombre Completo <span class="text-danger">*</span></label>
                                    <input type="text" name="nombre_completo" class="form-control @error('nombre_completo') is-invalid @enderror" 
                                           value="{{ old('nombre_completo', $cliente->nombre_completo) }}" required>
                                    @error('nombre_completo')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label for="dni">DNI <span class="text-danger">*</span></label>
                                    <input type="text" name="dni" class="form-control @error('dni') is-invalid @enderror" 
                                           value="{{ old('dni', $cliente->dni) }}" required>
                                    @error('dni')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label for="telefono">Teléfono <span class="text-danger">*</span></label>
                                    <input type="text" name="telefono" class="form-control @error('telefono') is-invalid @enderror" 
                                           value="{{ old('telefono', $cliente->telefono) }}" required>
                                    @error('telefono')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" 
                                           value="{{ old('email', $cliente->email) }}">
                                    @error('email')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="fecha_nacimiento">Fecha de Nacimiento <span class="text-danger">*</span></label>
                                    <input type="date" name="fecha_nacimiento" class="form-control @error('fecha_nacimiento') is-invalid @enderror" 
                                           value="{{ old('fecha_nacimiento', $cliente->fecha_nacimiento->format('Y-m-d')) }}" required>
                                    @error('fecha_nacimiento')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label for="genero">Género <span class="text-danger">*</span></label>
                                    <select name="genero" class="form-control @error('genero') is-invalid @enderror" required>
                                        <option value="">Seleccione...</option>
                                        <option value="M" {{ old('genero', $cliente->genero) == 'M' ? 'selected' : '' }}>Masculino</option>
                                        <option value="F" {{ old('genero', $cliente->genero) == 'F' ? 'selected' : '' }}>Femenino</option>
                                    </select>
                                    @error('genero')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label for="direccion">Dirección</label>
                                    <textarea name="direccion" class="form-control @error('direccion') is-invalid @enderror">{{ old('direccion', $cliente->direccion) }}</textarea>
                                    @error('direccion')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label for="condiciones_medicas">Condiciones Médicas</label>
                                    <textarea name="condiciones_medicas" class="form-control @error('condiciones_medicas') is-invalid @enderror">{{ old('condiciones_medicas', $cliente->condiciones_medicas) }}</textarea>
                                    @error('condiciones_medicas')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12">
                                <h4 class="mt-3 mb-3">Información de Emergencia</h4>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="contacto_emergencia">Contacto de Emergencia</label>
                                            <input type="text" name="contacto_emergencia" class="form-control @error('contacto_emergencia') is-invalid @enderror" 
                                                   value="{{ old('contacto_emergencia', $cliente->contacto_emergencia) }}">
                                            @error('contacto_emergencia')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="telefono_emergencia">Teléfono de Emergencia</label>
                                            <input type="text" name="telefono_emergencia" class="form-control @error('telefono_emergencia') is-invalid @enderror" 
                                                   value="{{ old('telefono_emergencia', $cliente->telefono_emergencia) }}">
                                            @error('telefono_emergencia')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="box-footer mt-3">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-save"></i> {{ __('Actualizar') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection