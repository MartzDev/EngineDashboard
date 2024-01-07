<?php

namespace App\Http\Controllers;

use App\Models\Contactos;
use App\Http\Requests\StoreContactosRequest;
use App\Http\Requests\UpdateContactosRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ContactosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('contactos.index', ['contactos' => Contactos::with('user')->withTrashed()->latest()->get()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreContactosRequest $request)
    {
        $request->user()->contactos()->create($request->all());

        return back()->with('status', 'contacto-registrado');
    }

    /**
     * Display the specified resource.
     */
    public function show(Contactos $contactos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contactos $contactos)
    {
        $this->authorize('update', $contactos);

        return view('contactos.edit', [
            'chirp' => $contactos,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateContactosRequest $request, Contactos $contactos)
    {
        $this->authorize('update', $contactos);

        $contactos->update($request->all());

        return to_route('contactos.index')->with('status', 'contacto-editado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contactos $contactos)
    {
        $this->authorize('delete', $contactos);

        $contactos->delete();

        return back()->with('status', 'contacto-eliminado');
    }

    /**
     * Restore the specified resource from storage.
     */
    public function restore($contactos): RedirectResponse
    {
        $contactos = Contactos::withTrashed()->find($contactos);

        $this->authorize('restore', $contactos);

        $contactos->restore();

        return back()->with('status', 'contacto-restaurado');
    }
}
