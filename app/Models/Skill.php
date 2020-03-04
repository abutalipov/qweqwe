<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\FullTextSearch;

class Skill extends Model {

    use FullTextSearch;
    
    public $curUserVote = 'test';
    protected $fillable=[
        'overall_weight'
    ];
    protected $searchable = [
        'title'
    ];

    public function users() {
        return $this->belongsToMany('App\Models\User');
    }
    public function votes() {
        return $this->hasMany('App\Models\Vote');
    }
}
