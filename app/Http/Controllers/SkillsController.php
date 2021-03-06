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
        $s=$request->get('search_f',false);

        if ($s or $s===null){
            return redirect('/skills/rating/'.$s);
        }
        try {
            $skill = Skill::where(['title'=>$skillname])->firstOrFail();
        } catch (ModelNotFoundException $exception) {
            $skill = null;
        }
        $sus=null;
        //sus - SkillUser`S
        if ($skill)
        $sus = SkillUser::with('user')->where(['skill_id'=>$skill->id])->orderBy('rating', 'desc')->get();

        //return $users;

        $data = [
            'skill' => $skill,
            'skillname' => $skillname,
            'sus' => $sus,
            'user' => \Auth::user(),
        ];

        return view('skills.rating')->with($data);
    }
    public function index(Request $request, $skillname = null) {
        $s=$request->get('search_f',false);

        if ($s or $s===null){
            return redirect('/skills/rating/'.$s);
        }

        //sus - SkillUser`S
        $sus = SkillUser::with('user')->orderBy('r_0', 'desc')->get();

        //return $users;

        $data = [
            'skill' => null,
            'skillname' => '',
            'sus' => $sus,
            'user' => \Auth::user(),
        ];

        return view('skills.rating')->with($data);
    }
    public function profileskill(Request $request){
        $user_id = $request->get('user_id');
        $user = User::find($user_id);
        $skills = $user->skills;
        $me = Auth::user();
        foreach ($skills as $skill){
            $skill->voted = $skill->votes->where('skill_id', $skill->id)->where('user_id', $user_id)->where('voting_user_id', $me->id)->first();
            $sw = $skill->overall_weight;
            $usw = $skill->pivot->weight;
            $skill->rating_sum = $sw * $usw;
        }
        return json_encode(['skills'=>$skills,'iam'=>Auth::user()->id,'user_id'=>$user_id]);

    }
    public function vote(Request $request) {
        $user = $request->get('user');
        $skill_id = $request->get('skill');
        $currentUser = \Auth::user();
        try {
            $user = User::where('id',$user)->with(['skills' => function($query) use ($skill_id) {
                            $query->whereIn('skill_id', [$skill_id]);
                        }])->firstOrFail();
        } catch (ModelNotFoundException $exception) {
            abort(404);
        }
        if ($currentUser->id == $user->id) {
            abort(406);
        }

        $vote = new Vote(['voting_user_id' => $currentUser->id, 'user_id' => $user->id, 'skill_id' => $skill_id, ]);
        $vote->save();
        return json_encode($vote);
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
