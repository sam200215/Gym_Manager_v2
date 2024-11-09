<?php

namespace App\Http\Controllers;

use App\Models\Rolporpermiso;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\RolporpermisoRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class RolporpermisoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $rolporpermisos = Rolporpermiso::paginate();

        return view('rolporpermiso.index', compact('rolporpermisos'))
            ->with('i', ($request->input('page', 1) - 1) * $rolporpermisos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $rolporpermiso = new Rolporpermiso();

        return view('rolporpermiso.create', compact('rolporpermiso'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RolporpermisoRequest $request): RedirectResponse
    {
        Rolporpermiso::create($request->validated());

        return Redirect::route('rolporpermisos.index')
            ->with('success', 'Rolporpermiso created successfully.');
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
        $rolporpermiso = Rolporpermiso::find($id);

        return view('rolporpermiso.edit', compact('rolporpermiso'));
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
