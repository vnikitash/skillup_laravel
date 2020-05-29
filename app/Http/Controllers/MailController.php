<?php

namespace App\Http\Controllers;


use App\Jobs\SendEmailJob;
use App\Models\User;

class MailController
{
    /**
     *
     */
    public function send()
    {

        $job = new SendEmailJob('nikitashvictor@gmail.com', "Nikitash");
        dispatch($job)->onQueue("emails");

        /*foreach(User::all()->toArray() as $user) {
            $job = new SendEmailJob($user['email'], $user['name']);
            dispatch($job);
        }*/

        return response()->json(['status' => true, 'message' => 'Email sent']);
    }

    public function sms()
    {
        $job = new SendEmailJob('nikitashvictor@gmail.com', "Nikitash");
        dispatch($job)->onQueue("sms");

        return response()->json(['status' => true, 'message' => 'SMS CREATED']);
    }
}