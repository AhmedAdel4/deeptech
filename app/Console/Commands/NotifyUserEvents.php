<?php

namespace App\Console\Commands;

use App\Models\UserEvent;
use App\Notifications\UserEventsNotification;
use Illuminate\Console\Command;

class NotifyUserEvents extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'UserEvent:Notify';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Notify User if there is an event befor it strats by 2 days';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $userEvents = UserEvent::whereNotNull('startDate')->get();
        foreach($userEvents as $userEvent)
        {
            $diff = now()->diffInDays($userEvent->startDate);
            if($diff == 0 || $diff == 1 || $diff == 2)
            {
                $userEvent->user->notify(new UserEventsNotification($userEvent,$diff));
            }
        }
        return 0;
    }
}
