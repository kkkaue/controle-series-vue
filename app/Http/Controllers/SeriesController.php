<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesRequest;
use App\Models\Season;
use App\Models\Series;
use App\Models\Episode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SeriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $series = Series::query()
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
        DB::transaction(function () use ($request) {
            $series = Series::create($request->all());
            $seasons = [];
            $episodes = [];
            for ($i = 1; $i <= $request->seasons; $i++) {
                $seasons[] = ['number' => $i, 'series_id' => $series->id];
            }
            Season::insert($seasons);

            foreach ($series->seasons as $season) {
                for ($i = 1; $i <= $request->episodes; $i++) {
                    $episodes[] = ['number' => $i, 'season_id' => $season->id];
                }
            }
            Episode::insert($episodes);
        });

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
        $serie = Series::findOrFail($id);

        return inertia('Series/Edit', [
            'serie' => $serie,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SeriesRequest $request, string $id)
    {
        $serie = Series::findOrFail($id);
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
        $serie = Series::findOrFail($id);
        $serie->delete();

        return redirect()->route('series.index')->with('success', 'Série excluída com sucesso!');
    }
}
