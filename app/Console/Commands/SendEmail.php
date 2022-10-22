<?php

namespace App\Console\Commands;

use App\Models\Todo;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;

class SendEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:name';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $todo = Todo::get();
        foreach ($todo as $todos) {
            if (Carbon::parse($todos->Endofdate)->diffInDays(Carbon::now()) == 1) {

                $to_name = auth()->name;
                $to_email = auth()->email;
                $data = array('name' => $to_name, "body" => "1 day in remaining in expiry of task");

                Mail::send('emails.mail', $data, function ($msg) use ($to_name, $to_email) {
                    $msg->to($to_email, $to_name)
                        ->subject('ALERT');
                    $msg->from(env('MAIL_FROM_ADDRESS'), 'Hassan Khalid');
                });
            }
        }

        return 0;
    }
}
