@extends('layouts.app')

@section('template_title')
Crear Nuevo Pago
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="float-left">
                        <span class="card-title">Crear Nuevo Pago</span>
                    </div>
                    <div class="float-right">
                        <a class="btn btn-primary" href="{{ route('pagos.index') }}">
                            <i class="fa fa-arrow-left"></i> Volver
                        </a>
                    </div>
                </div>

                <div class="card-body bg-white">
                    <form method="POST" action="{{ route('pagos.store') }}" role="form">
                        @csrf

                        <div class="row">
                            <!-- Sección de Pago -->
                            <div class="col-md-6">
                                <h4 class="mb-3">Información del Pago</h4>
                                <div class="form-group mb-3">
                                    <label for="cliente_id"><span class="text-danger">*</span>Cliente</label>
                                    <select name="cliente_id" class="form-control @error('cliente_id') is-invalid @enderror" required>
                                        <option value="">Seleccione un cliente</option>
                                        @foreach($clientes as $cliente)
                                        <option value="{{ $cliente->id }}">{{ $cliente->nombre_completo }}</option>
                                        @endforeach
                                    </select>
                                    @error('cliente_id')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Sección de Detalles -->
                            <div class="col-md-6">
                                <h4 class="mb-3">Detalles de Membresía</h4>
                                <div class="form-group mb-3">
                                    <label for="membresia_id">Membresía</label>
                                    <select name="membresia_id" id="membresia_id" class="form-control @error('membresia_id') is-invalid @enderror" required onchange="calcularTotal()">
                                        <option value="">Seleccione una membresía</option>
                                        @foreach($membresias as $membresia)
                                        <option value="{{ $membresia->id }}" data-precio="{{ $membresia->costo }}">
                                            {{ $membresia->tipo }} - L. {{ number_format($membresia->costo, 2) }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('membresia_id')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label for="cantidad">Cantidad</label>
                                    <input type="number" name="cantidad" id="cantidad"
                                        class="form-control @error('cantidad') is-invalid @enderror"
                                        value="1" min="1" required onchange="calcularTotal()">
                                    @error('cantidad')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label for="subtotal">Subtotal</label>
                                    <div class="input-group">
                                        <span class="input-group-text">L. </span>
                                        <input type="number" name="subtotal" id="subtotal"
                                            class="form-control" step="0.01" readonly>
                                    </div>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="total">Total</label>
                                    <div class="input-group">
                                        <span class="input-group-text">L.</span>
                                        <input type="number" name="total" id="total"
                                            class="form-control" step="0.01" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="box-footer mt-3">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-save"></i> Guardar
                            </button>
                            <a class="btn btn-danger" href="{{ route('pagos.index') }}">
                                <i class="fa fa-times"></i> Cancelar
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    function calcularTotal() {
        const membresia = document.getElementById('membresia_id');
        const cantidad = parseInt(document.getElementById('cantidad').value) || 0;
        const precio = parseFloat(membresia.options[membresia.selectedIndex].dataset.precio) || 0;

        const subtotal = precio * cantidad;
        document.getElementById('subtotal').value = subtotal.toFixed(2);
        document.getElementById('total').value = subtotal.toFixed(2);
    }

    document.addEventListener('DOMContentLoaded', calcularTotal);
</script>
@endpush
@endsection