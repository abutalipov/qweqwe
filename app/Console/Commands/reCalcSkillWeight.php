<?php

namespace App\Console\Commands;

use App\Models\Skill;
use App\Models\Vote;
use Illuminate\Console\Command;

class reCalcSkillWeight extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'recalc:skill_weight';

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
        $skill_votes = Vote::all();
        $skill_votes_by_skill = $skill_votes->groupBy('skill_id');
        $count = $skill_votes->count();
        foreach ($skill_votes_by_skill as $key => $skill_vote){
            $skill = Skill::find($key);
            $weight = round($skill_vote->count()/$count,2);
            $skill->update(['overall_weight'=>$weight]);
            $this->info($key.' - '.$weight);
        }
    }
}
