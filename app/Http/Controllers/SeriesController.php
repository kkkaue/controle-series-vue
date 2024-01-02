<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesRequest;
use App\Models\Serie;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $series = Serie::query()
            ->orderBy('title')
            ->get();

        return inertia('Series/Index', [
            'series' => $series,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia('Series/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SeriesRequest $request)
    {
        $serie = Serie::create([
            'title' => $request->title,
        ]);

        return redirect()->route('series.index')->with('success', 'Série criada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $serie = Serie::findOrFail($id);

        return inertia('Series/Edit', [
            'serie' => $serie,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SeriesRequest $request, string $id)
    {
        $serie = Serie::findOrFail($id);
        $serie->update([
            'title' => $request->title,
        ]);

        return redirect()->route('series.index')->with('success', 'Série atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $serie = Serie::findOrFail($id);
        $serie->delete();

        return redirect()->route('series.index')->with('success', 'Série excluída com sucesso!');
    }
}
