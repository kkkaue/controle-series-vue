<?php

namespace App\Events;

use App\Models\Series;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SeriesCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $series;

    /**
     * Create a new event instance.
     */
    public function __construct(Series $series)
    {
        $this->series = $series;
    }

    public function getSeries(): Series
    {
        return $this->series;
    }

    public function getSeriesTitle(): string
    {
        return $this->series->title;
    }

    public function getSeriesSeasons(): int
    {
        return $this->series->seasons->count();
    }

    public function getSeriesEpisodes(): int
    {
        return $this->series->episodes->count();
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('channel-name'),
        ];
    }
}
