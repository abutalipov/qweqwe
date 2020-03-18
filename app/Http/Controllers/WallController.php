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
    public function search(Request $request){
        $q=$request->get('q',false);
        $u_id=$request->get('user_id',false);
        $walls = Wall::where('parent_id',null)->where('content','LIKE','%te%');
        if($u_id){
            $walls=$walls->where('user_id',$u_id);
        }
        $walls = $walls->get();
        return json_encode($walls);

    }
    public function update(Request $request){
        $wall_id = $request->get('wall_id',false);
        $content = $request->get('content',false);
        $wall = Wall::find($wall_id);
        if ($wall && $content){
            $wall->update(['content'=>$content]);
            return json_encode($wall);
        }else{
            return json_encode(['error'=>'not updated']);
        }
    }
}
