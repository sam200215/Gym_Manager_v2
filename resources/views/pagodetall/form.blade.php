<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="pago_id" class="form-label">{{ __('Pago Id') }}</label>
            <input type="text" name="pago_id" class="form-control @error('pago_id') is-invalid @enderror" value="{{ old('pago_id', $pagodetall?->pago_id) }}" id="pago_id" placeholder="Pago Id">
            {!! $errors->first('pago_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="membresia_id" class="form-label">{{ __('Membresia Id') }}</label>
            <input type="text" name="membresia_id" class="form-control @error('membresia_id') is-invalid @enderror" value="{{ old('membresia_id', $pagodetall?->membresia_id) }}" id="membresia_id" placeholder="Membresia Id">
            {!! $errors->first('membresia_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="cantidad" class="form-label">{{ __('Cantidad') }}</label>
            <input type="text" name="cantidad" class="form-control @error('cantidad') is-invalid @enderror" value="{{ old('cantidad', $pagodetall?->cantidad) }}" id="cantidad" placeholder="Cantidad">
            {!! $errors->first('cantidad', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="subtotal" class="form-label">{{ __('Subtotal') }}</label>
            <input type="text" name="subtotal" class="form-control @error('subtotal') is-invalid @enderror" value="{{ old('subtotal', $pagodetall?->subtotal) }}" id="subtotal" placeholder="Subtotal">
            {!! $errors->first('subtotal', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>