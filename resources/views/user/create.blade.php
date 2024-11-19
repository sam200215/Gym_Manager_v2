@extends('layouts.app')

@section('template_title')
    Crear Usuario
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Crear Usuario</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('users.index') }}">
                                <i class="fa fa-arrow-left"></i> Volver
                            </a>
                        </div>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('users.store') }}" role="form">
                            @csrf
                            @include('user.form')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection