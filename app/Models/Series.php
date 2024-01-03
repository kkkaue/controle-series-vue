<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Series extends Model
{
  use HasFactory;

  protected $fillable = [
    'title',
  ];

  public function seasons()
  {
    return $this->hasMany(Season::class);
  }

  public function episodes()
  {
    return $this->hasManyThrough(Episode::class, Season::class);
  }

  protected static function booted()
  {
    self::addGlobalScope('order', function ($query) {
      $query->orderBy('nome');
    });
  }
}