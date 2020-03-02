<?php

namespace App\Console\Commands;

use App\Models\SkillUser;
use App\Models\Vote;
use Illuminate\Console\Command;

class reCalcRates extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'recalc:rates';

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
        $skill_votes = Vote::all()->groupBy('skill_id');
        foreach ($skill_votes as $skill_id=>$skill_vote){
            dump('          skill - '.$skill_id);
            $count = $skill_vote->count();
            $userVotes = $this->userVotes($skill_vote);
            $avg = $this->avgSkillVotes($userVotes);
            $avgSqrt = $this->getAvqSqrt($userVotes,$avg);
            foreach ($skill_vote->groupBy('user_id') as $user_id => $userVote){
                $n_rate =abs($userVotes[$user_id] - $avg / $avgSqrt);
                $weight = 0.5+0.5*($n_rate+3);
                //dump($weight.' - '.$user_id);
                SkillUser::where('user_id',$user_id)->where('skill_id',$skill_id)->update(['weight'=>$weight]);
            }
        }
        $this->info("end");
        //
    }
    public function getAvqSqrt($userVotes,$avg){
        $count = array_sum($userVotes);
        $quadsum = 0;
        foreach ($userVotes as $key=>$userVote){
            $quadsum += pow($userVote-$avg,2);
        }
        return round(sqrt(abs($quadsum/$count-1)),2);
    }
    public function avgSkillVotes($res){
        $sum = array_sum($res);
        $count = count($res);
        return $sum/$count;
    }
    public function userVotes($SkillVotes){
        $data = $SkillVotes->groupBy('user_id');
        $res=[];
        foreach ($data as $key=>$item){
            $res[$key]=$item->count();
        }
        return $res;
    }
}
