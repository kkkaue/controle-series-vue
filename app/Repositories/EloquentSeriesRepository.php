<?php

namespace App\Repositories;

use App\Models\Series;
use App\Models\Season;
use App\Models\Episode;
use Illuminate\Support\Facades\DB;
use App\Repositories\Interfaces\SeriesRepositoryInterface;

class EloquentSeriesRepository implements SeriesRepositoryInterface
{
  public function create(array $data): Series
  {
    return DB::transaction(function () use ($data) {
      $series = Series::create($data);
      $seasons = [];
      $episodes = [];
      for ($i = 1; $i <= $data['seasons']; $i++) {
        $seasons[] = ['number' => $i, 'series_id' => $series->id];
      }
      Season::insert($seasons);

      foreach ($series->seasons as $season) {
        for ($i = 1; $i <= $data['episodes']; $i++) {
          $episodes[] = ['number' => $i, 'season_id' => $season->id];
        }
      }
      Episode::insert($episodes);

      return $series;
    });
  }
}