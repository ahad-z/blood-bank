<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Mail\RequestSendEmail;
use Illuminate\Support\Facades\Mail;


class EmailSendRequest implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public $url;
    public $email;
    public function __construct($url, $email)
    {
        $this->url = $url;
        $this->email = $email;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        try{
            Mail::to($this->email)->send(new RequestSendEmail($this->url));
        }catch(\Exception $e){
            return response([
                'status' => true,
                'message' => $e
            ]);
        }
    }
}
