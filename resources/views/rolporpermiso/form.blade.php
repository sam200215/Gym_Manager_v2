<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="rol_id" class="form-label">{{ __('Rol Id') }}</label>
            <input type="text" name="rol_id" class="form-control @error('rol_id') is-invalid @enderror" value="{{ old('rol_id', $rolporpermiso?->rol_id) }}" id="rol_id" placeholder="Rol Id">
            {!! $errors->first('rol_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="permiso_id" class="form-label">{{ __('Permiso Id') }}</label>
            <input type="text" name="permiso_id" class="form-control @error('permiso_id') is-invalid @enderror" value="{{ old('permiso_id', $rolporpermiso?->permiso_id) }}" id="permiso_id" placeholder="Permiso Id">
            {!! $errors->first('permiso_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>