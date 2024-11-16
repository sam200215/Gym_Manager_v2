@extends('layouts.app')

@section('template_title')
    Rolporpermisos
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title">
                                {{ __('Asignacion de permisos') }}
                            </span>
                            <div class="float-right">
                                <a href="{{ route('rolporpermisos.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Asignar nuevo permiso') }}
                                </a>
                              </div>
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
                                        <th>Rol</th>
                                        <th>Permiso</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($rolporpermisos as $rolporpermiso)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $rolporpermiso->rol->nombre }}</td>
                                            <td>{{ $rolporpermiso->permiso->nombre }}</td>
                                            <td>
                                                <form action="{{ route('rolporpermisos.destroy', $rolporpermiso->id) }}" method="POST">
                                                    
                                                    <a class="btn btn-sm btn-success" href="{{ route('rolporpermisos.edit', $rolporpermiso->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="event.preventDefault(); confirm('Are you sure to delete?') ? this.closest('form').submit() : false;"><i class="fa fa-fw fa-trash"></i> {{ __('Eliminar') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $rolporpermisos->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@endsection
