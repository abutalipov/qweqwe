<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Vote;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Models\User;
use App\Models\SkillUser;

class SkillsController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    public function rating(Request $request, $skillname = null) {
       try {
            $skill = Skill::where(['title'=>$skillname])->firstOrFail();
        } catch (ModelNotFoundException $exception) {
            abort(404);
        }

        //sus - SkillUser`S
        $sus = SkillUser::with('user')->where(['skill_id'=>$skill->id])->orderBy('rating', 'desc')->get();

        //return $users;

        $data = [
            'skill' => $skill,
            'sus' => $sus,
            'user' => \Auth::user(),            
        ];

        return view('skills.rating')->with($data);
    }

    public function vote(Request $request) {

        $currentUser = \Auth::user();

        $username = $request->input('user');
        $skill_id = $request->input('skill');

        try {
            $user = User::where(['name' => $username])->with(['skills' => function($query) use ($skill_id) {
                            $query->whereIn('skill_id', [$skill_id]);
                        }])->firstOrFail();
        } catch (ModelNotFoundException $exception) {
            abort(404);
        }

        if ($currentUser->id == $user->id) {
            abort(406);
        }

        //Ищем у пользователя такой же скилл, и берем его вес
        $curUserSkill = SkillUser::where(['skill_id' => $skill_id, 'user_id' => $currentUser->id])->first();
        $weight = $curUserSkill ? $curUserSkill->weight : SkillUser::DEFAULT_WEIGHT;


        $vote = new Vote(['voting_user_id' => $currentUser->id, 'user_id' => $user->id, 'skill_id' => $skill_id, 'weight' => $weight]);
        $vote->save();



        return response()->json([$username, $skill_id, $user->name, $vote->title], 200);
    }

    public function pluck(Request $request) {
        $query = $request->input('q');

        //dd($query);

        $skills = $query ? Skill::search($query)->select('id', 'title as text')->get() : [];
        //return $skills;
        //$res = new \stdClass();
        //$res->total_count = 123;
        //$res->items = $skills;

        return response()->json(['results' => $skills], 200);

        // return json_encode($res);
    }

}
