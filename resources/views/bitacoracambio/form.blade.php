<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="usuario" class="form-label">{{ __('Usuario') }}</label>
            <input type="text" name="usuario" class="form-control @error('usuario') is-invalid @enderror" value="{{ old('usuario', $bitacoracambio?->usuario) }}" id="usuario" placeholder="Usuario">
            {!! $errors->first('usuario', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="tabla" class="form-label">{{ __('Tabla') }}</label>
            <input type="text" name="tabla" class="form-control @error('tabla') is-invalid @enderror" value="{{ old('tabla', $bitacoracambio?->tabla) }}" id="tabla" placeholder="Tabla">
            {!! $errors->first('tabla', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="accion" class="form-label">{{ __('Accion') }}</label>
            <input type="text" name="accion" class="form-control @error('accion') is-invalid @enderror" value="{{ old('accion', $bitacoracambio?->accion) }}" id="accion" placeholder="Accion">
            {!! $errors->first('accion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>