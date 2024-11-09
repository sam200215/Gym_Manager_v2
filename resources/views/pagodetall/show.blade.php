@extends('layouts.app')

@section('template_title')
    {{ $pagodetall->name ?? __('Show') . " " . __('Pagodetall') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Pagodetall</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('pagodetalls.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Pago Id:</strong>
                                    {{ $pagodetall->pago_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Membresia Id:</strong>
                                    {{ $pagodetall->membresia_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Cantidad:</strong>
                                    {{ $pagodetall->cantidad }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Subtotal:</strong>
                                    {{ $pagodetall->subtotal }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
