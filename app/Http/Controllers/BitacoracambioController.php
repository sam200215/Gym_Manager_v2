<?php

namespace App\Http\Controllers;

use App\Models\Bitacoracambio;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\BitacoracambioRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class BitacoracambioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $bitacoracambios = Bitacoracambio::paginate();

        return view('bitacoracambio.index', compact('bitacoracambios'))
            ->with('i', ($request->input('page', 1) - 1) * $bitacoracambios->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $bitacoracambio = new Bitacoracambio();

        return view('bitacoracambio.create', compact('bitacoracambio'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BitacoracambioRequest $request): RedirectResponse
    {
        Bitacoracambio::create($request->validated());

        return Redirect::route('bitacoracambios.index')
            ->with('success', 'Bitacoracambio created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $bitacoracambio = Bitacoracambio::find($id);

        return view('bitacoracambio.show', compact('bitacoracambio'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $bitacoracambio = Bitacoracambio::find($id);

        return view('bitacoracambio.edit', compact('bitacoracambio'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BitacoracambioRequest $request, Bitacoracambio $bitacoracambio): RedirectResponse
    {
        $bitacoracambio->update($request->validated());

        return Redirect::route('bitacoracambios.index')
            ->with('success', 'Bitacoracambio updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Bitacoracambio::find($id)->delete();

        return Redirect::route('bitacoracambios.index')
            ->with('success', 'Bitacoracambio deleted successfully');
    }
}
