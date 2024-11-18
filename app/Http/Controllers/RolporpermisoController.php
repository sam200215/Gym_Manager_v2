<?php

namespace App\Http\Controllers;

use App\Models\Rolporpermiso;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\RolporpermisoRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Rol;
use App\Models\Permiso;

class RolporpermisoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        // Cargar los nombres de roles y permisos
        try {
            $rolporpermisos = Rolporpermiso::with(['rol', 'permiso'])->paginate();
            
            return view('rolporpermiso.index', compact('rolporpermisos'))
                ->with('i', ($request->input('page', 1) - 1) * $rolporpermisos->perPage());
        } catch (\Exception $e) {
            \Log::error('Error en rolporpermisos.index: ' . $e->getMessage());
            return view('rolporpermiso.index')->withErrors(['error' => 'Error al cargar los datos']);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $roles = Rol::all();
        $permisos = Permiso::all();

        return view('rolporpermiso.create', compact('roles', 'permisos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'rol_id' => 'required|exists:rols,id',
            'permiso_id' => 'required|exists:permisos,id',
        ]);

        // Verificar si el permiso ya está asignado al rol
        $exists = Rolporpermiso::where('rol_id', $request->rol_id)
            ->where('permiso_id', $request->permiso_id)
            ->exists();

        if ($exists) {
            return redirect()->back()->withErrors(['permiso_id' => 'El permiso ya está asignado a este rol.']);
        }

        Rolporpermiso::create($request->all());

        return redirect()->route('rolporpermisos.index')
            ->with('success', 'Permiso asignado al rol correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $rolporpermiso = Rolporpermiso::find($id);

        return view('rolporpermiso.show', compact('rolporpermiso'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $rolporpermiso = Rolporpermiso::findOrFail($id);
        $roles = Rol::all();
        $permisos = Permiso::all();

        return view('rolporpermiso.edit', compact('rolporpermiso', 'roles', 'permisos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RolporpermisoRequest $request, Rolporpermiso $rolporpermiso): RedirectResponse
    {
        $rolporpermiso->update($request->validated());

        return Redirect::route('rolporpermisos.index')
            ->with('success', 'Rolporpermiso updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Rolporpermiso::find($id)->delete();

        return Redirect::route('rolporpermisos.index')
            ->with('success', 'Rolporpermiso deleted successfully');
    }
}
