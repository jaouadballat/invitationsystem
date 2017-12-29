<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Notification;
use App\Notifications\SendInvitation;

class SendInvitationJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $invitation;
    public $email;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($invitation, $email)
    {
        $this->invitation = $invitation;
        $this->email = $email;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        
        Notification::route('mail', $this->email)
            ->notify(new SendInvitation($this->invitation));
    }
}
