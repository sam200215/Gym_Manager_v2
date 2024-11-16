@extends('layouts.app')

@section('template_title')
    Bitacoracambios
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title">
                                {{ __('Bitácora de Cambios') }}
                            </span>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success m-4">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body bg-white">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        <th>Usuario</th>
                                        <th>Tabla</th>
                                        <th>Acción</th>
                                        <th>IP</th>
                                        <th>Fecha</th>
                                        <th>Detalles</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($bitacoracambios as $bitacoracambio)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $bitacoracambio->usuario }}</td>
                                            <td>{{ $bitacoracambio->tabla }}</td>
                                            <td>
                                                <span class="badge bg-{{ $bitacoracambio->getBadgeClass() }}">
                                                    {{ $bitacoracambio->accion }}
                                                </span>
                                            </td>
                                            <td>{{ $bitacoracambio->ip }}</td>
                                            <td>{{ $bitacoracambio->created_at->format('d/m/Y H:i:s') }}</td>
                                            <td>
                                                <a href="{{ route('bitacoracambios.show', $bitacoracambio->id) }}" 
                                                   class="btn btn-sm btn-info">
                                                    <i class="fa fa-eye"></i> Ver
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $bitacoracambios->links() !!}
            </div>
        </div>
    </div>
@endsection