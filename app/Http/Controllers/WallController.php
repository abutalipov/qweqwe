<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Models\User;
use App\Models\Wall;

class WallController extends Controller
{
    public function list(Request $request, $username){
        
        try {
            $user = User::where(['name' => $username])->with(['skills' => function($query) use ($skill_id) {
                            $query->whereIn('skill_id', [$skill_id]);
                        }])->firstOrFail();
        } catch (ModelNotFoundException $exception) {
            abort(404);
        }
        
        $modelWall = Wall::where();
        return $username;
    }
}
