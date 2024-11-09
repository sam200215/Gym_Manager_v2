@extends('layouts.app')

@section('template_title')
    Pagodetalls
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Pagodetalls') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('pagodetalls.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
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
                                        
									<th >Pago Id</th>
									<th >Membresia Id</th>
									<th >Cantidad</th>
									<th >Subtotal</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pagodetalls as $pagodetall)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
										<td >{{ $pagodetall->pago_id }}</td>
										<td >{{ $pagodetall->membresia_id }}</td>
										<td >{{ $pagodetall->cantidad }}</td>
										<td >{{ $pagodetall->subtotal }}</td>

                                            <td>
                                                <form action="{{ route('pagodetalls.destroy', $pagodetall->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('pagodetalls.show', $pagodetall->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('pagodetalls.edit', $pagodetall->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="event.preventDefault(); confirm('Are you sure to delete?') ? this.closest('form').submit() : false;"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $pagodetalls->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@endsection
