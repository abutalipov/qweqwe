<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Wall;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getPost($id){
        return Wall::whereid($id)->firstOrFail();
    }

    public function newComment(Request $request, $post){
        try {
            $post = $this->getPost($post);
        } catch (ModelNotFoundException $exception) {
            abort(404);
        }
        $currentUser = \Auth::user();

        $wallComment = new \App\Models\Wall();
        $wallComment->user_id = $currentUser->id;
        $wallComment->content = $request->input('content');
        $wallComment->parent_id = $post->id;
        $wallComment->save();

        $author = User::where('id',$post->user_id)->firstOrFail();

        return redirect('profile/' . $author->name)->with('success', 'Comments posted successfully');

    }
}
