<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\HistoryOfLogin;

class LogSuccessfulLogin
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  Login  $event
     * @return void
     */
    public function handle(Login $event)
    {
        $event->user->active = true;
        $event->user->save();
        
        $description = ['name' => $event->user->name, 'position' => $event->user->position];
        $record = HistoryOfLogin::create($description);

        session()->flash('successConfirm', 'Login success!');
    }
}
