<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\EmpleadoRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class EmpleadoController extends Controller
{
    public function index(Request $request): View
    {
        $empleados = Empleado::paginate();
        return view('empleado.index', compact('empleados'))
            ->with('i', ($request->input('page', 1) - 1) * $empleados->perPage());
    }

    public function create(): View
    {
        $empleado = new Empleado();
        return view('empleado.create', compact('empleado'));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nombre_completo' => 'required|string|max:100',
            'dni' => 'required|string|max:15|unique:empleados',
            'telefono' => 'required|string|max:15',
            'direccion' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:100|unique:empleados',
            'cargo' => 'required|string|max:50',
            'salario' => 'required|numeric|min:0',
            'fecha_contratacion' => 'required|date',
            'horario_trabajo' => 'nullable|string|max:100',
            'tipo_contrato' => 'required|in:Tiempo Completo,Medio Tiempo,Por Horas',
            'numero_seguro_social' => 'nullable|string|max:20',
            'contacto_emergencia' => 'nullable|string|max:100',
            'telefono_emergencia' => 'nullable|string|max:15'
        ]);

        Empleado::create($request->all());

        return redirect()->route('empleados.index')
            ->with('success', 'Empleado creado exitosamente.');
    }

    public function show($id): View
    {
        $empleado = Empleado::findOrFail($id);
        return view('empleado.show', compact('empleado'));
    }

    public function edit($id): View
    {
        $empleado = Empleado::findOrFail($id);
        return view('empleado.edit', compact('empleado'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'nombre_completo' => 'required|string|max:100',
            'dni' => 'required|string|max:15|unique:empleados,dni,'.$id,
            'telefono' => 'required|string|max:15',
            'direccion' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:100|unique:empleados,email,'.$id,
            'cargo' => 'required|string|max:50',
            'salario' => 'required|numeric|min:0',
            'fecha_contratacion' => 'required|date',
            'horario_trabajo' => 'nullable|string|max:100',
            'tipo_contrato' => 'required|in:Tiempo Completo,Medio Tiempo,Por Horas',
            'numero_seguro_social' => 'nullable|string|max:20',
            'contacto_emergencia' => 'nullable|string|max:100',
            'telefono_emergencia' => 'nullable|string|max:15'
        ]);

        $empleado = Empleado::findOrFail($id);
        $empleado->update($request->all());

        return redirect()->route('empleados.index')
            ->with('success', 'Empleado actualizado exitosamente.');
    }

    public function destroy($id): RedirectResponse
    {
        Empleado::findOrFail($id)->delete();
        return redirect()->route('empleados.index')
            ->with('success', 'Empleado eliminado exitosamente.');
    }
}