<?php

namespace App\Http\Controllers;

use Auth;

class UserController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }
    
    public function friends() {
        $user = Auth::user();

        return view('user.friends', ['user'=>$user]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $user = Auth::user();

        if ($user->isAdmin()) {
            return view('pages.admin.home');
        } else {
            return redirect('profile/'.$user->name);
            //echo $user->name;
           
        }

        return view('pages.user.home');
    }

}
