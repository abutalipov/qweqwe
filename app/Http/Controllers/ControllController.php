<?php

namespace App\Http\Controllers;

use App\Http\Requests\DeleteUserAccount;
use App\Http\Requests\UpdateUserPasswordRequest;
use App\Http\Requests\UpdateUserProfile;
use App\Models\Profile;
use App\Models\Theme;
use App\Models\User;
use App\Models\Skill;
use App\Models\Vote;
use App\Notifications\SendGoodbyeEmail;
use App\Traits\CaptureIpTrait;
use File;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Image;
use jeremykenedy\Uuid\Uuid;
use Validator;
use View;
use Illuminate\Database\Seeder;
//use Illuminate\Faker;
use jeremykenedy\LaravelRoles\Models\Role;

class ControllController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function votes(Request $request) {
        $votes = \App\Models\Vote::get();

        $request->flash();

        return view('controll.votes', [                    
                    'votes' => $votes,
                ])->render();
    }
    
    public function users(Request $request) {
        $users = \App\Models\User::orderBy('name')->get();

        $request->flash();

        return view('controll.users', [                    
                    'users' => $users,
                ])->render();
    }

    public function index(Request $request) {
        
    }
    public function deleteVotes(Request $request){
        Vote::truncate();

        return back();
    }

}
