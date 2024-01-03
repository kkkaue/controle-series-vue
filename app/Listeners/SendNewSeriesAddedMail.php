<?php

namespace App\Listeners;

use App\Events\SeriesCreated;
use App\Mail\NewSeriesAddedMail;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendNewSeriesAddedMail
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(SeriesCreated $event): void
    {
        $userList = User::all();
        foreach ($userList as $user) {
            $email = new NewSeriesAddedMail($event->getSeries());
            Mail::to($user)->queue($email);
        }
    }
}
