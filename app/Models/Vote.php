<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model {

    protected $casts = [
        'skill_id' => 'integer',
        'user_id' => 'integer'
    ];
    protected $fillable = [
        'voting_user_id',
        'user_id',
        'skill_id',
        'weight'
    ];
    
    public function skill()
    {
        return $this->belongsTo('App\Models\Skill');
    }
    
    public function voting_user()
    {
        return $this->belongsTo('App\Models\User', 'voting_user_id');
    }
    
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

}
