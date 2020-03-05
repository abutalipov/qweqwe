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

    public function vote($userid, $skill_id) {

        $currentUser = \Auth::user();
        try {
            $user = User::where('id',$userid)->with(['skills' => function($query) use ($skill_id) {
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
        return redirect('/profile/' . $user->name);
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
