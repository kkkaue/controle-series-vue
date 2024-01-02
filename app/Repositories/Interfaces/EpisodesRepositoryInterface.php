<?php 

namespace App\Repositories\Interfaces;

use App\Models\Season;

interface EpisodesRepositoryInterface
{
  public function watch(Season $season, array $episodeWatchedId): Season;
}