<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Models\User;
use App\Models\Wall;

class PagesController extends Controller
{
    public function view(Request $request, $uri){
        $page = \App\Page::where(['uri' => $uri])->firstOrFail();
        return view('pages.view')->with(['page'=>$page]);
        
    }
}
