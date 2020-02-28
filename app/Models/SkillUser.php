<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SkillUser extends Model
{
    const DEFAULT_WEIGHT = 1;
    
    public $test = 'asd';
    
    protected $table = 'skill_user';
    
    
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    
    public function skill()
    {
        return $this->belongsTo('App\Models\Skill');
    }
    
    //
}
