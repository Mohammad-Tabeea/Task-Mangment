<?php

namespace App\Jobs;

use App\Notifications\registernotification;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class SendRegisterNotification implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $user;
    public function __construct(User $user)
    {
        $this->user = $user;
    }
    public function handle()
    {
        try {
            $this->user->notify(new registernotification());
        } catch (\Exception $e) {
            Log::error('Error sending RegisterNotification: ' . $e->getMessage());
        }
    }
}
