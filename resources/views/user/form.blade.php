<div class="box box-info padding-1">
    <div class="box-body">
        <div class="form-group mb-3">
            <label for="name">Nombre</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                   value="{{ old('name', $user->name ?? '') }}" required>
            @error('name')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                   value="{{ old('email', $user->email ?? '') }}" required>
            @error('email')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="password">Contraseña {{ isset($user) ? '(dejar en blanco para mantener)' : '' }}</label>
            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                   {{ !isset($user) ? 'required' : '' }}>
            @error('password')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="password_confirmation">Confirmar Contraseña</label>
            <input type="password" name="password_confirmation" class="form-control"
                   {{ !isset($user) ? 'required' : '' }}>
        </div>

        <div class="form-group mb-3">
            <label for="rol_id">Rol</label>
            <select name="rol_id" class="form-control @error('rol_id') is-invalid @enderror" required>
                <option value="">Seleccione un rol</option>
                @foreach($roles as $rol)
                    <option value="{{ $rol->id }}" 
                        {{ old('rol_id', $user->rol_id ?? '') == $rol->id ? 'selected' : '' }}>
                        {{ $rol->nombre }}
                    </option>
                @endforeach
            </select>
            @error('rol_id')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="box-footer mt-3">
        <button type="submit" class="btn btn-primary">
            <i class="fa fa-save"></i> {{ isset($user) ? 'Actualizar' : 'Guardar' }}
        </button>
    </div>
</div>