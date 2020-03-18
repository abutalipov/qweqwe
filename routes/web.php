<?php

/*
  |--------------------------------------------------------------------------
  | Web Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register web routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | contains the "web" middleware group. Now create something great!
  |
  | Middleware options can be located in `app/Http/Kernel.php`
  |
 */
//URL::forceScheme('https');
// Homepage Route
Route::group(['middleware' => ['web', 'checkblocked']], function () {
    Route::get('/', 'WelcomeController@welcome')->name('welcome');
});

// Authentication Routes
Auth::routes();

// Public Routes
Route::group(['middleware' => ['web', 'activity', 'checkblocked']], function () {

    // Activation Routes
    Route::get('/activate', ['as' => 'activate', 'uses' => 'Auth\ActivateController@initial']);

    Route::get('/activate/{token}', ['as' => 'authenticated.activate', 'uses' => 'Auth\ActivateController@activate']);
    Route::get('/activation', ['as' => 'authenticated.activation-resend', 'uses' => 'Auth\ActivateController@resend']);
    Route::get('/exceeded', ['as' => 'exceeded', 'uses' => 'Auth\ActivateController@exceeded']);

    // Socialite Register Routes
    Route::get('/social/redirect/{provider}', ['as' => 'social.redirect', 'uses' => 'Auth\SocialController@getSocialRedirect']);
    Route::get('/social/handle/{provider}', ['as' => 'social.handle', 'uses' => 'Auth\SocialController@getSocialHandle']);

    // Route to for user to reactivate their user deleted account.
    Route::get('/re-activate/{token}', ['as' => 'user.reactivate', 'uses' => 'RestoreUserController@userReActivate']);
});

// Registered and Activated User Routes
Route::group(['middleware' => ['auth', 'activated', 'activity', 'checkblocked']], function () {

    // Activation Routes
    Route::get('/activation-required', ['uses' => 'Auth\ActivateController@activationRequired'])->name('activation-required');
    Route::get('/logout', ['uses' => 'Auth\LoginController@logout'])->name('logout');
});

Route::get('/pages/{uri}', ['as' => '{uri}', 'uses' => 'PagesController@view']);

// Registered and Activated User Routes
Route::group(['middleware' => ['auth', 'activated', 'activity', 'twostep', 'checkblocked']], function () {

    Route::get('/sapi/wall/{username}', ['as' => '{username}', 'uses' => 'WallController@list']);
    Route::get('/wall/search', [ 'uses' => 'WallController@search']);

    Route::get('/skills/rating/{skillname}', [ 'uses' => 'SkillsController@rating']);
    Route::get('/skills/rating/', [ 'uses' => 'SkillsController@index']);

    Route::get('search', 'SearchController@index')->name('search');


    Route::get('controll/votes', 'ControllController@votes')->name('controll_votes');
    Route::get('controll/users', 'ControllController@users')->name('controll_users');


  /*  Route::get('authfor/{username}', function ($username) {
        //echo $username;

        try {
            $user = App\Models\User::where(['name' => $username])->firstOrFail();
            auth()->login($user, true);
            return redirect('home');
            //Auth::logout();
            //Session::flush();

            return $user;
        } catch (ModelNotFoundException $exception) {
            abort(404);
        }
    });*/

    /* Добавление друга
     */
  Route::get('addfriend/{username}', function ($username) {

            $user = App\Models\User::where(['name' => $username])->firstOrFail();

            $fm = App\Friend::where(['owner_user_id' => $user->id, 'user_id' => Auth::user()->id])->first();

            $friendModel = new App\Friend();

            if ($fm) {
                $fm->status=true;
                $fm->save();
                $friendModel->status=true;
            }

            $friendModel->owner_user_id = Auth::user()->id;
            $friendModel->user_id = $user->id;
            $friendModel->save();

            return redirect('/profile/' . $username);
    });


    //
    //  Homepage Route - Redirect based on user role is in controller.
    Route::get('/home', ['as' => 'public.home', 'uses' => 'UserController@index']);
    
    
     Route::get('/friends', ['uses' => 'UserController@friends']);



    Route::get('/skills/pluck', ['as' => 'skills.pluck', 'uses' => 'SkillsController@pluck']);

    Route::get('/profile/randomseed', ['as' => 'skills.pluck', 'uses' => 'ProfilesController@randomSeed']);


    // Show users profile - viewable by other users.
    Route::get('profile/{username}', [
        'as' => '{username}',
        'uses' => 'ProfilesController@show',
    ]);
    
    Route::put('profile/{username}/newpost', [        
        'uses' => 'ProfilesController@newpost',
    ]);
    Route::put('post/{post}/new-comment', [
        'uses' => 'PostController@newComment',
    ]);
    Route::get('user/{user}/skill/{skill}/vote', [
        'as' => 'skills.vote',
        'uses' => 'SkillsController@vote',
    ]);
});

// Registered, activated, and is current user routes.
Route::group(['middleware' => ['auth', 'activated', 'currentUser', 'activity', 'twostep', 'checkblocked']], function () {

    // User Profile and Account Routes
    Route::resource(
            'profile',
            'ProfilesController', [
        'only' => [
            'show',
            'edit',
            'update',
            'create',
        ],
            ]
    );
    Route::put('profile/{username}/updateUserAccount', [
        'as' => '{username}',
        'uses' => 'ProfilesController@updateUserAccount',
    ]);
    Route::put('profile/{username}/updateUserPassword', [
        'as' => '{username}',
        'uses' => 'ProfilesController@updateUserPassword',
    ]);
    Route::delete('profile/{username}/deleteUserAccount', [
        'as' => '{username}',
        'uses' => 'ProfilesController@deleteUserAccount',
    ]);
    Route::get('dialog', [
        'as' => 'dialogs',
        'uses' => 'ConversationController@index',
    ]);
    Route::get('dialog/{conversation}', [
        'as' => 'dialog.inner',
        'uses' => 'ConversationController@dialog',
    ]);
    Route::put('dialog/{username}', [
        'as' => 'dialog.send',
        'uses' => 'ConversationController@send',
    ]);
    Route::get('dialog/{conversation}/clear', [
        'as' => 'dialog.clear',
        'uses' => 'ConversationController@clearDialog',
    ]);
    // Route to show user avatar
    Route::get('images/profile/{id}/avatar/{image}', [
        'uses' => 'ProfilesController@userProfileAvatar',
    ]);

    // Route to upload user avatar.
    Route::post('avatar/upload', ['as' => 'avatar.upload', 'uses' => 'ProfilesController@upload']);
});

// Registered, activated, and is admin routes.
Route::group(['middleware' => ['auth', 'activated', 'role:admin', 'activity', 'twostep', 'checkblocked']], function () {
    Route::resource('/users/deleted', 'SoftDeletesController', [
        'only' => [
            'index', 'show', 'update', 'destroy',
        ],
    ]);

    Route::resource('users', 'UsersManagementController', [
        'names' => [
            'index' => 'users',
            'destroy' => 'user.destroy',
        ],
        'except' => [
            'deleted',
        ],
    ]);
    Route::post('search-users', 'UsersManagementController@search')->name('search-users');

    Route::resource('themes', 'ThemesManagementController', [
        'names' => [
            'index' => 'themes',
            'destroy' => 'themes.destroy',
        ],
    ]);

    Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
    Route::get('routes', 'AdminDetailsController@listRoutes');
    Route::get('active-users', 'AdminDetailsController@activeUsers');

});

//Route::redirect('/php', '/phpinfo', 301);
