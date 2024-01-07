<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreChirpRequest;
use App\Http\Requests\UpdateChirpRequest;
use App\Models\Chirp;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Database\Eloquent\Builders;

class ChirpController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('chirps.index', [
            'chirps' => Chirp::with('user')->withTrashed()->latest()->get()
        ]);
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
    public function store(StoreChirpRequest $request): RedirectResponse
    {
        $request->user()->chirps()->create($request->all());

        // return to_route('chirps.index')->with('estado', 'chirp registrado');
        return back()->with('status', 'chirp-registrado');
    }

    /**
     * Display the specified resource.
     */
    public function show(Chirp $chirp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Chirp $chirp): View
    {
        $this->authorize('update', $chirp);

        return view('chirps.edit', [
            'chirp' => $chirp,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateChirpRequest $request, Chirp $chirp): RedirectResponse
    {
        $this->authorize('update', $chirp);

        $chirp->update($request->all());

        return to_route('chirps.index')->with('status', 'chirp-editado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chirp $chirp)
    {
        $this->authorize('delete', $chirp);

        $chirp->delete();

        return back()->with('status', 'chirp-eliminado');
    }

    /**
     * Restore the specified resource from storage.
     */
    public function restore($chirp): RedirectResponse
    {
        $chirp = Chirp::withTrashed()->find($chirp);

        $this->authorize('restore', $chirp);

        $chirp->restore();

        return back()->with('status', 'chirp-restaurado');
    }
}
