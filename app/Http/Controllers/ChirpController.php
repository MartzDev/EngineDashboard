<?php

namespace App\Http\Controllers;

use App\Models\Chirp;
use App\Http\Requests\StoreChirpRequest;
use App\Http\Requests\UpdateChirpRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;


class ChirpController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $chirps = Chirp::withoutTrashed('user')->paginate(15, ['*'], 'pageChirps');
        return view('chirp.index', compact('chirps'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('chirp.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreChirpRequest $request): RedirectResponse
    {
        $request->user()->chirps()->create($request->all());

        return to_route('chirp.index')->with('status', 'chirp created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Chirp $chirp): View
    {
        return view('chirp.show', compact('chirp'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Chirp $chirp)
    {
        return view('chirp.edit', compact('chirp'));
    }

    /**
     *
     * Update the specified resource in storage.
     */
    public function update(UpdateChirpRequest $request, Chirp $chirp): RedirectResponse
    {
        $chirp->update($request->all());

        return to_route('chirp.index')->with('status', 'chirp editado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chirp $chirp): RedirectResponse
    {
        $chirp->delete();
        return to_route('chirp.index')->with('status', 'chirp eliminado');
    }
}
