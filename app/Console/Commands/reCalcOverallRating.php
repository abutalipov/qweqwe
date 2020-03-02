<?php

namespace App\Console\Commands;

use App\Models\Vote;
use Illuminate\Console\Command;

class reCalcOverallRating extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'recalc:overall_rating';

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
     * @return mixed
     */
    public function handle()
    {
        $user_votes = Vote::all()->groupBy('user_id');
        foreach ($user_votes as $key=>$user_vote){
            dd($user_vote->toArray());
        }
    }
    public function getOverallRating($user){
        dd($user->skills->toArray());

        dd($votes->toArray());
    }
}
