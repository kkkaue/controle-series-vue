<?php

namespace App\Http\Controllers;

use App\Models\Season;
use App\Repositories\Interfaces\EpisodesRepositoryInterface;
use Illuminate\Http\Request;

class EpisodesController extends Controller
{
    public function __construct(private EpisodesRepositoryInterface $repository)
    {
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Season $season)
    {
        return inertia('Episodes/Index', [
            'series' => $season->series,
            'season' => $season,
            'episodes' => $season->episodes,
        ]);
    }

    public function watch(Season $season, Request $request)
    {
        $this->repository->watch($season, $request->episodes);

        return redirect()->back()->with('success', 'Episódios marcados como assistidos!');
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
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
