<?php

namespace App\Console\Commands;

use App\Models\Todo;
use Carbon\Carbon;
use Illuminate\Console\Command;

class statuschange extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'status:change';

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
        $todo = Todo::all();
        foreach($todo as $Item){
            $day = Carbon::parse($Item->Endofdate)->diffInDays(Carbon::now());
            if($day == '0'){
                Todo::where('id',$Item->id)->update(['status'=>'expired']);
            }
        }
    }
}
