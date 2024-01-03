<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesRequest;
use App\Mail\NewSeriesAddedMail;
use App\Models\Series;
use App\Models\User;
use App\Repositories\Interfaces\SeriesRepositoryInterface;
use Illuminate\Support\Facades\Mail;

class SeriesController extends Controller
{
    public function __construct(private SeriesRepositoryInterface $repository)
    {
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $series = Series::all();

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
        $data = [
            'title' => $request->title,
            'seasons' => $request->seasons,
            'episodes' => $request->episodes,
        ];

        $serie = $this->repository->create($data);

        $userList = User::all();
        foreach ($userList as $user) {
            $email = new NewSeriesAddedMail($serie);
            Mail::to($user)->queue($email);
        }

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
