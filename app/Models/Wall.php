<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wall extends Model
{
    protected $fillable = [
        'content'
    ];
    
    
    public function user() {
        return $this->hasOne('App\Models\User' ,'id', 'user_id');
    }
    
    public function children(){
        return $this->hasMany(self::class, 'parent_id', 'id');
    }
}
