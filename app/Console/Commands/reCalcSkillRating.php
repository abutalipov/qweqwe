<?php

namespace App\Console\Commands;

use App\Models\Profile;
use App\Models\SkillUser;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class reCalcSkillRating extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'recalc:skills_rating';

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
        $skills_users = SkillUser::all()->groupBy('skill_id');
        foreach ($skills_users as $skill=>$skill_users){
            self::updateByGlobal($skill);
            self::updateByCountry($skill);
            self::updateByCity($skill);
            self::updateByAdministrative($skill);
        }
    }

    public static function getData()
    {
        return SkillUser::join('skills', 'skill_user.skill_id', '=', 'skills.id')->join('users', 'skill_user.user_id', '=', 'users.id')->join('profiles', 'skill_user.user_id', '=', 'profiles.user_id');
    }

    public static function getByGlobal($skill)
    {
        return self::getData()->where('skill_id',$skill)->select(DB::raw('sum(weight*overall_weight) as main_weight, users.id ,name'))->groupBy('users.id')->orderBy('main_weight', 'desc')->get();
    }

    public static function getByCountry($skill)
    {
        $countries = Profile::all()->groupBy('country');
        $data = [];
        foreach ($countries as $country => $country_profiles) {
            $data[$country] = self::getData()->where('skill_id',$skill)->whereCountry($country);
        }
        return $data;
    }

    public static function getByCity($skill)
    {
        $cities = Profile::all()->groupBy('city');
        $data = [];
        foreach ($cities as $city => $city_profiles) {
            $data[$city] = self::getData()->where('skill_id',$skill)->whereCity($city);
        }
        return $data;
    }

    public static function getByAdministrative($skill)
    {
        $administratives = Profile::all()->groupBy('administrative');
        $data = [];
        foreach ($administratives as $administrative => $administrative_profiles) {
            $data[$administrative] = self::getData()->where('skill_id',$skill)->whereCity($administrative);
        }
        return $data;
    }

    public static function updateByGlobal($skill)
    {
        $res = self::getByGlobal($skill);
        $i = 1;
        foreach ($res as $row) {
            SkillUser::where('user_id',$row->id)->where('skill_id',$skill)->update(['r_0' => $i]);
            $i++;
        }
    }

    public static function updateByCountry($skill)
    {
        $res = self::getByCountry($skill);
        foreach ($res as $country) {
            $rows = $country->select(DB::raw('sum(weight*overall_weight) as main_weight ,users.id'))->groupBy('users.id')->orderBy('main_weight', 'desc')->get();

            $i = 1;
            foreach ($rows as $row) {
                SkillUser::where('user_id',$row->id)->where('skill_id',$skill)->update(['r_1' => $i]);
                $i++;
            }
        }
    }
    public static function updateByCity($skill)
    {
        $res = self::getByCity($skill);
        foreach ($res as $city) {
            $rows = $city->select(DB::raw('sum(weight*overall_weight) as main_weight ,users.id'))->groupBy('users.id')->orderBy('main_weight', 'desc')->get();

            $i = 1;
            foreach ($rows as $row) {
                SkillUser::where('user_id',$row->id)->where('skill_id',$skill)->update(['r_2' => $i]);
                $i++;
            }
        }
    }
    public static function updateByAdministrative($skill)
    {
        $res = self::getByAdministrative($skill);
        foreach ($res as $administrative) {
            $rows = $administrative->select(DB::raw('sum(weight*overall_weight) as main_weight ,users.id'))->groupBy('users.id')->orderBy('main_weight', 'desc')->get();

            $i = 1;
            foreach ($rows as $row) {
                SkillUser::where('user_id',$row->id)->where('skill_id',$skill)->update(['r_3' => $i]);
                $i++;
            }
        }
    }
}
