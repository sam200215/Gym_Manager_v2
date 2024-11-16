@extends('layouts.app')

@section('template_title')
    {{ $bitacoracambio->name ?? __('Show') . " " . __('Bitacoracambio') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Detalles del Registro') }}</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('bitacoracambios.index') }}">
                                <i class="fa fa-arrow-left"></i> {{ __('Volver') }}
                            </a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        <div class="form-group mb-3">
                            <strong>Usuario:</strong>
                            {{ $bitacoracambio->usuario }}
                        </div>
                        <div class="form-group mb-3">
                            <strong>Tabla:</strong>
                            {{ $bitacoracambio->tabla }}
                        </div>
                        <div class="form-group mb-3">
                            <strong>Acción:</strong>
                            <span class="badge bg-{{ $bitacoracambio->getBadgeClass() }}">
                                {{ $bitacoracambio->accion }}
                            </span>
                        </div>
                        <div class="form-group mb-3">
                            <strong>IP:</strong>
                            {{ $bitacoracambio->ip }}
                        </div>
                        <div class="form-group mb-3">
                            <strong>Fecha:</strong>
                            {{ $bitacoracambio->created_at->format('d/m/Y H:i:s') }}
                        </div>
                        
                        @if($bitacoracambio->datos_antiguos)
                            <div class="form-group mb-3">
                                <strong>Datos Anteriores:</strong>
                                <pre class="bg-light p-3 mt-2 rounded">{{ json_encode($bitacoracambio->datos_antiguos, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) }}</pre>
                            </div>
                        @endif

                        @if($bitacoracambio->datos_nuevos)
                            <div class="form-group mb-3">
                                <strong>Datos Nuevos:</strong>
                                <pre class="bg-light p-3 mt-2 rounded">{{ json_encode($bitacoracambio->datos_nuevos, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) }}</pre>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection