<!-- resources/views/rolporpermiso/form.blade.php -->

<div class="form-group">
    <label for="rol_id">{{ __('Rol') }}</label>
    <select name="rol_id" id="rol_id" class="form-control @error('rol_id') is-invalid @enderror">
        @foreach($roles as $rol)
            <option value="{{ $rol->id }}" {{ isset($rolporpermiso) && $rolporpermiso->rol_id == $rol->id ? 'selected' : '' }}>{{ $rol->nombre }}</option>
        @endforeach
    </select>
    @error('rol_id')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group">
    <label for="permiso_id">{{ __('Permiso') }}</label>
    <select name="permiso_id" id="permiso_id" class="form-control @error('permiso_id') is-invalid @enderror">
        @foreach($permisos as $permiso)
            <option value="{{ $permiso->id }}" {{ isset($rolporpermiso) && $rolporpermiso->permiso_id == $permiso->id ? 'selected' : '' }}>{{ $permiso->nombre }}</option>
        @endforeach
    </select>
    @error('permiso_id')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group">
    <button type="submit" class="btn btn-primary">{{ __('Guardar') }}</button>
</div>