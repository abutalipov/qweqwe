<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use jeremykenedy\LaravelRoles\Traits\HasRoleAndPermission;

class User extends Authenticatable {

    use HasRoleAndPermission;
    use Notifiable;
    use SoftDeletes;

    const FRIEND_STATUS_NOTHING = 0; //нияего
    const FRIEND_STATUS_SEND = 1; //отправил запрос
    const FRIEND_STATUS_RECEIVE = 2; //получен запрос
    const FRIEND_STATUS_SUPER = 3; //друзья

    public $friendStatus = self::FRIEND_STATUS_NOTHING;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'first_name',
        'last_name',
        'email',
        'password',
        'activated',
        'token',
        'signup_ip_address',
        'signup_confirmation_ip_address',
        'signup_sm_ip_address',
        'admin_ip_address',
        'updated_ip_address',
        'deleted_ip_address',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'activated',
        'token',
    ];
    protected $dates = [
        'deleted_at',
    ];

    public function friends() {
        return $this->belongsToMany('App\Models\User', 'friends', 'user_id', 'owner_user_id');
    }
    
    public function getRenderNameAttribute(){
        return $this->first_name ?? $this->name;
    }

   

    public function skills() {
        return $this->belongsToMany('App\Models\Skill')->withTimestamps()->withPivot('weight', 'rating');
    }

    /**
     * Build Social Relationships.
     *
     * @var array
     */
    public function social() {
        return $this->hasMany('App\Models\Social');
    }

    public function walls() {
        return $this->hasMany('App\Models\Wall')->where('parent_id','=',NULL);
    }
    public function messages() {
        return $this->hasMany(ConversationMessage::class);
    }

    /**
     * User Profile Relationships.
     *
     * @var array
     */
    public function profile() {
        return $this->hasOne('App\Models\Profile');
    }

    // User Profile Setup - SHould move these to a trait or interface...

    public function profiles() {
        return $this->belongsToMany('App\Models\Profile')->withTimestamps();
    }
    public function conversations() {
        return $this->belongsToMany(Conversation::class,'conversation_users');
    }
    public function conversation_users() {
        return $this->hasMany(ConversationUser::class);
    }
    public function hasProfile($name) {
        foreach ($this->profiles as $profile) {
            if ($profile->name == $name) {
                return true;
            }
        }

        return false;
    }

    public function assignProfile($profile) {
        return $this->profiles()->attach($profile);
    }

    public function removeProfile($profile) {
        return $this->profiles()->detach($profile);
    }
    public function conversation(){
       // dd($d);
        $user = $this;
        $currentUser = \Auth::user();
        $cu = new ConversationUser();
        $d = $cu->whereIn('conversation_id', function($query)use($currentUser) {
            $query->select('conversation_id')
                ->from(with(new ConversationUser)->getTable())
                ->where('user_id',$currentUser->id);
        })->where('user_id',$user->id)->first();
        if(!is_null($d)){
            $conversation=$d->conversation;
        }else {
            $conversation = Conversation::create();
            $conversation->ConversationUser()->create(['user_id' => $currentUser->id]);
            $conversation->ConversationUser()->create(['user_id' => $user->id]);
        }
        return $conversation;
    }
}
