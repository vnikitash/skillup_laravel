<?php

namespace App\Jobs;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $email;
    private $name;
    /**
     * Create a new job instance.
     *
     * @param string $email
     * @param string $name
     */
    public function __construct(string $email, string $name)
    {
        $this->email = $email;
        $this->name = $name;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //CLASS1 CLASS2 CLASS3
        User::query()->first();
        $data = ['user' => $this->name];
        Mail::send('emails.mail', $data, function($message) {
            $message->to($this->email, $this->name)
                ->subject("Моя тестовая тема");
            $message->from("admin@gmail.com", "Test Email");
        });
    }
}
