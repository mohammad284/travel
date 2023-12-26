<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\TripeLine;
class RefrishTrip extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tripeLine:refrish';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'refrish trip after booking every day automatically';

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
        $day = now()->format('l');
        $trips = TripeLine::where('day',$day)->get();
        foreach($trips as $trip){
            $trip->free_sit = $trip->total_sit;
            $trip->save();
        }
    }
}
