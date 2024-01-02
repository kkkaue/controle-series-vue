<?php

namespace App\Repositories;

use App\Models\Episode;
use App\Models\Season;
use Illuminate\Support\Facades\DB;
use App\Repositories\Interfaces\EpisodesRepositoryInterface;

class EloquentEpisodesRepository implements EpisodesRepositoryInterface
{
  public function watch(Season $season, array $episodeWatchedId): Season
  {
    return DB::transaction(function () use ($season, $episodeWatchedId) {
      Episode::whereIn('id', $episodeWatchedId)
             ->where('season_id', $season->id)
             ->update(['watched' => true]);

      return $season;
  });
  }
}