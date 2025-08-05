<?php

namespace App\Listeners;

use App\Notifications\WelcomeEmailNotification;
use Illuminate\Auth\Events\Verified;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class SendWelcomeEmail implements ShouldQueue
{
    use InteractsWithQueue;

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
    public function handle(Verified $event): void
    {
        try {
            // Send welcome email notification to the verified user
            $event->user->notify(new WelcomeEmailNotification());

            // Log successful welcome email sending
            Log::info('Welcome email sent successfully', [
                'user_id' => $event->user->id,
                'user_email' => $event->user->email,
                'timestamp' => now()
            ]);
        } catch (\Exception $e) {
            // Log any errors but don't break the email verification flow
            Log::error('Failed to send welcome email', [
                'user_id' => $event->user->id,
                'user_email' => $event->user->email,
                'error' => $e->getMessage(),
                'timestamp' => now()
            ]);

            // Optionally re-throw the exception if you want to retry
            // throw $e;
        }
    }

    /**
     * Handle a job failure.
     */
    public function failed(Verified $event, \Throwable $exception): void
    {
        Log::error('Welcome email listener job failed', [
            'user_id' => $event->user->id,
            'user_email' => $event->user->email,
            'error' => $exception->getMessage(),
            'timestamp' => now()
        ]);
    }
}
