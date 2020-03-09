<?php

namespace App\Console\Commands;

use App\Models\Profile;
use App\Models\Skill;
use App\Models\SkillUser;
use App\Models\User;
use App\Models\Vote;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class reCalcRating extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'recalc:rating';

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
        self::updateByGlobal();
        self::updateByCountry();
        self::updateByCity();
        self::updateByAdministrative();
    }

    public static function getData()
    {
        return SkillUser::join('skills', 'skill_user.skill_id', '=', 'skills.id')->join('users', 'skill_user.user_id', '=', 'users.id')->join('profiles', 'skill_user.user_id', '=', 'profiles.user_id');
    }

    public static function getByGlobal()
    {
        return self::getData()->select(DB::raw('sum(weight*overall_weight) as main_weight, users.id ,name'))->groupBy('users.id')->orderBy('main_weight', 'desc')->get();
    }

    public static function getByCountry()
    {
        $countries = Profile::all()->groupBy('country');
        $data = [];
        foreach ($countries as $country => $country_profiles) {
            $data[$country] = self::getData()->whereCountry($country);
        }
        return $data;
    }

    public static function getByCity()
    {
        $cities = Profile::all()->groupBy('city');
        $data = [];
        foreach ($cities as $city => $city_profiles) {
            $data[$city] = self::getData()->whereCity($city);
        }
        return $data;
    }

    public static function getByAdministrative()
    {
        $administratives = Profile::all()->groupBy('administrative');
        $data = [];
        foreach ($administratives as $administrative => $administrative_profiles) {
            $data[$administrative] = self::getData()->whereCity($administrative);
        }
        return $data;
    }

    public static function updateByGlobal()
    {
        $res = self::getByGlobal();
        $i = 1;
        foreach ($res as $row) {
            User::find($row->id)->update(['r_0' => $i]);
            $i++;
        }
    }

    public static function updateByCountry()
    {
        $res = self::getByCountry();
        foreach ($res as $country) {
            $rows = $country->select(DB::raw('sum(weight*overall_weight) as main_weight ,users.id'))->groupBy('users.id')->orderBy('main_weight', 'desc')->get();

            $i = 1;
            foreach ($rows as $row) {
                User::find($row->id)->update(['r_1' => $i]);
                $i++;
            }
        }
    }
    public static function updateByCity()
    {
        $res = self::getByCity();
        foreach ($res as $city) {
            $rows = $city->select(DB::raw('sum(weight*overall_weight) as main_weight ,users.id'))->groupBy('users.id')->orderBy('main_weight', 'desc')->get();

            $i = 1;
            foreach ($rows as $row) {
                User::find($row->id)->update(['r_2' => $i]);
                $i++;
            }
        }
    }
    public static function updateByAdministrative()
    {
        $res = self::getByAdministrative();
        foreach ($res as $administrative) {
            $rows = $administrative->select(DB::raw('sum(weight*overall_weight) as main_weight ,users.id'))->groupBy('users.id')->orderBy('main_weight', 'desc')->get();

            $i = 1;
            foreach ($rows as $row) {
                User::find($row->id)->update(['r_3' => $i]);
                $i++;
            }
        }
    }
}
