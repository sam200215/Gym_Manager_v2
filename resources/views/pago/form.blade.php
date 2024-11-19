<div class="box box-info padding-1">
    <div class="box-body">
        <!-- Datos del Pago -->
        <div class="form-group mb-3">
            <label for="cliente_id">Cliente</label>
            <select name="cliente_id" class="form-control">
                @foreach($clientes as $cliente)
                    <option value="{{ $cliente->id }}">{{ $cliente->nombre }}</option>
                @endforeach
            </select>
        </div>

        <!-- Datos del Detalle -->
        <div class="form-group mb-3">
            <label for="membresia_id">Membresía</label>
            <select name="membresia_id" class="form-control" id="membresia_id" onchange="calcularSubtotal()">
                @foreach($membresias as $membresia)
                    <option value="{{ $membresia->id }}" data-precio="{{ $membresia->precio }}">
                        {{ $membresia->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group mb-3">
            <label for="cantidad">Cantidad</label>
            <input type="number" name="cantidad" class="form-control" id="cantidad" value="1" min="1" onchange="calcularSubtotal()">
        </div>

        <div class="form-group mb-3">
            <label for="subtotal">Subtotal</label>
            <input type="number" name="subtotal" class="form-control" id="subtotal" readonly>
        </div>

        <div class="form-group mb-3">
            <label for="total">Total</label>
            <input type="number" name="total" class="form-control" id="total" readonly>
        </div>
    </div>
    
    <div class="box-footer mt-3">
        <button type="submit" class="btn btn-primary">{{ __('Guardar') }}</button>
    </div>
</div>

<script>
function calcularSubtotal() {
    const membresia = document.getElementById('membresia_id');
    const cantidad = document.getElementById('cantidad').value;
    const precio = membresia.options[membresia.selectedIndex].dataset.precio;
    
    const subtotal = precio * cantidad;
    document.getElementById('subtotal').value = subtotal;
    document.getElementById('total').value = subtotal;
}

document.addEventListener('DOMContentLoaded', calcularSubtotal);
</script>