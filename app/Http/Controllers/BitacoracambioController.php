<?php

namespace App\Http\Controllers;

use App\Models\Bitacoracambio;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BitacoracambioController extends Controller
{
    /**
     * Muestra el listado de la bitácora.
     */
    public function index(Request $request): View
    {
        $bitacoracambios = Bitacoracambio::orderBy('created_at', 'desc')->paginate();

        return view('bitacoracambio.index', compact('bitacoracambios'))
            ->with('i', ($request->input('page', 1) - 1) * $bitacoracambios->perPage());
    }

    /**
     * Muestra los detalles de un registro específico.
     */
    public function show($id): View
    {
        $bitacoracambio = Bitacoracambio::findOrFail($id);

        return view('bitacoracambio.show', compact('bitacoracambio'));
    }
}