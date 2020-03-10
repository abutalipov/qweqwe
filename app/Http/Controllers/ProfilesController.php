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
use Illuminate\Support\Facades\Session;
use Image;
use jeremykenedy\Uuid\Uuid;
use Validator;
use View;
use Illuminate\Database\Seeder;
//use Illuminate\Faker;
use jeremykenedy\LaravelRoles\Models\Role;

class ProfilesController extends Controller {

    protected $idMultiKey = '618423'; //int
    protected $seperationKey = '****';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    public function randomSeed() {
        
        

        $skillVariants = [24451, 3166, 20914, 9433, 21670, 18197, 25566, 20952, 15000, 31102, 5271, 5277];
        $skillIds = array_rand(array_flip($skillVariants), random_int(2, 4));
        
      
        $faker = \Faker\Factory::create();
        
        $image = $faker->image('images/fapro',640,480);
                
        //return;
        
        $profile = new Profile();
        $userRole = Role::whereName('User')->first();

        $seededAdminEmail = $faker->email;
        $user = User::where('email', '=', $seededAdminEmail)->first();
        if ($user === null) {
            $user = User::create([
                        'name' => $faker->userName,
                        'first_name' => $faker->firstName,
                        'last_name' => $faker->lastName,
                        'email' => $seededAdminEmail,
                        'password' => \Hash::make('password'),
                        'token' => str_random(64),
                        'activated' => true,
                        'signup_confirmation_ip_address' => $faker->ipv4,
                        'admin_ip_address' => $faker->ipv4,
            ]);

            $profile->bio = $faker->text;
            $profile->avatar = '/'.$image;

            $user->profile()->save($profile);
            $user->attachRole($userRole);
            
            $user->skills()->sync($skillIds);

            return response()->json($user->save(), 200);
            //return $user->save();
        }
    }

    /**
     * Fetch user
     * (You can extract this to repository method).
     *
     * @param $username
     *
     * @return mixed
     */
    public function getUserByUsername($username) {
        return User::with('profile')->wherename($username)->firstOrFail();
    }
    public function getUserById($id) {
        return User::whereid($id)->firstOrFail();
    }
    
    public function newpost(Request $request, $username){
        try {
            $user = $this->getUserByUsername($username);
        } catch (ModelNotFoundException $exception) {
            abort(404);
        }

        $currentUser = \Auth::user();

        if ($currentUser->id == $user->id) {
            $wallModel = new \App\Models\Wall();
            $wallModel->user_id = $currentUser->id;
            $wallModel->content = $request->input('content');
            $wallModel->save();
            
            return redirect('profile/' . $user->name)->with('success', 'News posted successfully');
            
        }else{
            abort(403);
        }
    }


    /**
     * Display the specified resource.
     *
     * @param string $username
     *
     * @return Response
     */
    public function show($username) {
        try {
            $user = $this->getUserByUsername($username);
        } catch (ModelNotFoundException $exception) {
            abort(404);
        }
        $user->skills;
        $user->overall_rating = 0;
        foreach($user->skills as $keys=>$skill){
            $skill_user_weight = $skill->pivot->weight;
            $skill_weight = $skill->overall_weight;
            $user->overall_rating +=$skill_user_weight*$skill_weight;
        }
        $user->overall_rating = round($user->overall_rating,2);

        $currentTheme = Theme::find($user->profile->theme_id);
        $currentUser = \Auth::user();

        if ($currentUser->id != $user->id) {
            $votes = Vote::select('skill_id')->where(['voting_user_id' => $currentUser->id, 'user_id' => $user->id])->pluck('skill_id')->toArray();

            foreach ($user->skills as $skill) {
                $skill->voted = in_array($skill->id, $votes);
            }
            
            //Поиск уже друга
            $fmSend = \App\Friend::where(['owner_user_id' => $currentUser->id, 'user_id' => $user->id])->first();                        
            $fmReceive = \App\Friend::where(['owner_user_id' => $user->id, 'user_id' => $currentUser->id])->first();            
            
            
            if ($fmSend && $fmReceive){
                $user->friendStatus = User::FRIEND_STATUS_SUPER;
            }elseif ($fmSend) {
                $user->friendStatus = User::FRIEND_STATUS_SEND;
            }elseif ($fmReceive) {
                $user->friendStatus = User::FRIEND_STATUS_RECEIVE;
            }

        }

        $data = [
            'user' => $user,
            'currentTheme' => $currentTheme,
            'currentUser' => $currentUser,
        ];

        return view('profiles.show')->with($data);
    }


    /**
     * /profiles/username/edit.
     *
     * @param $username
     *
     * @return mixed
     */
    public function edit($username) {
        try {
            $user = $this->getUserByUsername($username);
        } catch (ModelNotFoundException $exception) {
            return view('pages.status')
                            ->with('error', trans('profile.notYourProfile'))
                            ->with('error_title', trans('profile.notYourProfileTitle'));
        }

        //$skills = Skill::limit(4)->pluck('title', 'id');
        //print_r($skills); exit();

        $themes = Theme::where('status', 1)
                ->orderBy('name', 'asc')
                ->get();

        $currentTheme = Theme::find($user->profile->theme_id);



        $data = [
            'user' => $user,
            'themes' => $themes,
            'currentTheme' => $currentTheme,
            'skills' => $user->skills->pluck('title', 'id')
        ];

        return view('profiles.edit')->with($data);
    }

    /**
     * Update a user's profile.
     *
     * @param \App\Http\Requests\UpdateUserProfile $request
     * @param $username
     *
     * @throws Laracasts\Validation\FormValidationException
     *
     * @return mixed
     */
    public function update(UpdateUserProfile $request, $username) {
        $user = $this->getUserByUsername($username);

        $input = $request->only('theme_id','birthday', 'location', 'bio', 'twitter_username', 'github_username','facebook_username', 'avatar_status', 'administrative', 'country', 'city', 'address');

        $ipAddress = new CaptureIpTrait();

        if ($user->profile == null) {
            $profile = new Profile();
            $profile->fill($input);
            $user->profile()->save($profile);
        } else {
            $user->profile->fill($input)->save();
        }

        $user->updated_ip_address = $ipAddress->getClientIp();
        $user->save();

        $skills = $request->input('skills');
        $user->skills()->sync($skills);


        return redirect('profile/' . $user->name . '/edit')->with('success', trans('profile.updateSuccess'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function updateUserAccount(Request $request, $id) {
        $currentUser = \Auth::user();
        $user = User::findOrFail($id);
        $emailCheck = ($request->input('email') != '') && ($request->input('email') != $user->email);
        $ipAddress = new CaptureIpTrait();
        $rules = [];

        if ($user->name != $request->input('name')) {
            $usernameRules = [
                'name' => 'required|max:255|unique:users',
            ];
        } else {
            $usernameRules = [
                'name' => 'required|max:255',
            ];
        }
        if ($emailCheck) {
            $emailRules = [
                'email' => 'email|max:255|unique:users',
            ];
        } else {
            $emailRules = [
                'email' => 'email|max:255',
            ];
        }
        $additionalRules = [
            'first_name' => 'nullable|string|max:255',
            'last_name' => 'nullable|string|max:255',
        ];

        $rules = array_merge($usernameRules, $emailRules, $additionalRules);
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $user->name = $request->input('name');
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');

        if ($emailCheck) {
            $user->email = $request->input('email');
        }

        $user->updated_ip_address = $ipAddress->getClientIp();

        $user->save();

        return redirect('profile/' . $user->name . '/edit')->with('success', trans('profile.updateAccountSuccess'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateUserPasswordRequest $request
     * @param int                                          $id
     *
     * @return \Illuminate\Http\Response
     */
    public function updateUserPassword(UpdateUserPasswordRequest $request, $id) {
        $currentUser = \Auth::user();
        $user = User::findOrFail($id);
        $ipAddress = new CaptureIpTrait();

        if ($request->input('password') != null) {
            $user->password = bcrypt($request->input('password'));
        }

        $user->updated_ip_address = $ipAddress->getClientIp();
        $user->save();

        return redirect('profile/' . $user->name . '/edit')->with('success', trans('profile.updatePWSuccess'));
    }

    /**
     * Upload and Update user avatar.
     *
     * @param $file
     *
     * @return mixed
     */
    public function upload(Request $request) {
        if ($request->hasFile('file')) {
            $currentUser = \Auth::user();
            $avatar = $request->file('file');
            $filename = 'avatar.' . $avatar->getClientOriginalExtension();
            $save_path = storage_path() . '/users/id/' . $currentUser->id . '/uploads/images/avatar/';
            $path = $save_path . $filename;
            $public_path = '/images/profile/' . $currentUser->id . '/avatar/' . $filename;

            // Make the user a folder and set permissions
            File::makeDirectory($save_path, $mode = 0755, true, true);

            // Save the file to the server
            Image::make($avatar)->resize(300, 300)->save($save_path . $filename);

            // Save the public image path
            $currentUser->profile->avatar = $public_path;
            $currentUser->profile->save();

            return response()->json(['path' => $path], 200);
        } else {
            return response()->json(false, 200);
        }
    }

    /**
     * Show user avatar.
     *
     * @param $id
     * @param $image
     *
     * @return string
     */
    public function userProfileAvatar($id, $image) {
        return Image::make(storage_path() . '/users/id/' . $id . '/uploads/images/avatar/' . $image)->response();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\DeleteUserAccount $request
     * @param int                                  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function deleteUserAccount(DeleteUserAccount $request, $id) {
        $currentUser = \Auth::user();
        $user = User::findOrFail($id);
        $ipAddress = new CaptureIpTrait();

        if ($user->id != $currentUser->id) {
            return redirect('profile/' . $user->name . '/edit')->with('error', trans('profile.errorDeleteNotYour'));
        }

        // Create and encrypt user account restore token
        $sepKey = $this->getSeperationKey();
        $userIdKey = $this->getIdMultiKey();
        $restoreKey = config('settings.restoreKey');
        $encrypter = config('settings.restoreUserEncType');
        $level1 = $user->id * $userIdKey;
        $level2 = urlencode(Uuid::generate(4) . $sepKey . $level1);
        $level3 = base64_encode($level2);
        $level4 = openssl_encrypt($level3, $encrypter, $restoreKey);
        $level5 = base64_encode($level4);

        // Save Restore Token and Ip Address
        $user->token = $level5;
        $user->deleted_ip_address = $ipAddress->getClientIp();
        $user->save();

        // Send Goodbye email notification
        $this->sendGoodbyEmail($user, $user->token);

        // Soft Delete User
        $user->delete();

        // Clear out the session
        $request->session()->flush();
        $request->session()->regenerate();

        return redirect('/login/')->with('success', trans('profile.successUserAccountDeleted'));
    }

    /**
     * Send GoodBye Email Function via Notify.
     *
     * @param array  $user
     * @param string $token
     *
     * @return void
     */
    public static function sendGoodbyEmail(User $user, $token) {
        $user->notify(new SendGoodbyeEmail($token));
    }

    /**
     * Get User Restore ID Multiplication Key.
     *
     * @return string
     */
    public function getIdMultiKey() {
        return $this->idMultiKey;
    }

    /**
     * Get User Restore Seperation Key.
     *
     * @return string
     */
    public function getSeperationKey() {
        return $this->seperationKey;
    }

}
