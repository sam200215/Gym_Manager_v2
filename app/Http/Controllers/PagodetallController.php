<?php

namespace App\Http\Controllers;

use App\Models\Pagodetall;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\PagodetallRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class PagodetallController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $pagodetalls = Pagodetall::paginate();

        return view('pagodetall.index', compact('pagodetalls'))
            ->with('i', ($request->input('page', 1) - 1) * $pagodetalls->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $pagodetall = new Pagodetall();

        return view('pagodetall.create', compact('pagodetall'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PagodetallRequest $request): RedirectResponse
    {
        Pagodetall::create($request->validated());

        return Redirect::route('pagodetalls.index')
            ->with('success', 'Pagodetall created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $pagodetall = Pagodetall::find($id);

        return view('pagodetall.show', compact('pagodetall'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $pagodetall = Pagodetall::find($id);

        return view('pagodetall.edit', compact('pagodetall'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PagodetallRequest $request, Pagodetall $pagodetall): RedirectResponse
    {
        $pagodetall->update($request->validated());

        return Redirect::route('pagodetalls.index')
            ->with('success', 'Pagodetall updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Pagodetall::find($id)->delete();

        return Redirect::route('pagodetalls.index')
            ->with('success', 'Pagodetall deleted successfully');
    }
}
