<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\FullTextSearch;

class Skill extends Model {

    use FullTextSearch;
    
    public $curUserVote = 'test';
    
    protected $searchable = [
        'title'
    ];

    public function users() {
        return $this->belongsToMany('App\Models\User');
    }

}
