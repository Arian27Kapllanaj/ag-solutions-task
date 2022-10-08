<?php

namespace App\Console\Commands;

use App\Mail\MessageMail;
use App\Models\EmailEvent;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

class EmailSend extends Command
{
    public $message;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sending pending emails stored in the database';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        echo $this->description . "\n";
        $emails = EmailEvent::where('datetime', '<=', Carbon::now())->get();
        foreach ($emails as $this->message) {
            echo "Sending " . $this->message->text . " to " . $this->message->email . " ...\n";
            // Mail::send('email', ['text' => $this->message->text], function ($message) {
            //     $message->to($this->message->email,'');
            //     $message->subject('Message from Mail Central');
            // });
        }
        EmailEvent::where('datetime', '<=', Carbon::now())->delete();
        echo "All pending emails sent!\n";
        return Command::SUCCESS;
    }
}
