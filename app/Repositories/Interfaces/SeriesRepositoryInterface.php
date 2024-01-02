<?php 

namespace App\Repositories\Interfaces;

use App\Models\Series;

interface SeriesRepositoryInterface
{
    public function create(array $data): Series;
}