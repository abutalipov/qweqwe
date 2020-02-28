<?php

namespace App\Http\Controllers;

use App\Models\Conversation;
use App\Models\ConversationMessage;
use App\Models\ConversationUser;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class ConversationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $currentUser = \Auth::user();
        $conversation_users = $currentUser->conversation_users;
        $data = [
            'user' => $currentUser,
            'conversation_users' => $conversation_users,
        ];

        return view('dialogs.dialogs.show')->with($data);
    }
    public function dialog($conversation_id)
    {

        $messages = ConversationMessage::get()->where('conversation_id',$conversation_id);
        $users = ConversationUser::get()->where('conversation_id',$conversation_id);
      //  dd($messages);
        $currentUser = \Auth::user();
        $data = [
            'user' => $currentUser,
            'messages' => $messages,
            'users' => $users,
            'conversation_id' => $conversation_id,
        ];

        return view('dialogs.dialog-inner.show')->with($data);
    }
    public function send(Request $request,$conversation_id){

        $user_id=$request->input('user');
        $content=$request->input('message');
        $messageModel = ConversationMessage::create([
            'user_id'=>$user_id,
            'content'=>$content,
            'conversation_id'=>$conversation_id,
        ]);
        return redirect(route('dialog.inner',['conversation'=>$conversation_id]));

    }
    public function clearDialog($conversation){
        $currentUser = \Auth::user();
        $result = ConversationUser::all()->where('user_id',$currentUser->id)->where('conversation_id',$conversation);
        if($result){
            foreach ($result as $item){
                $item->delete();
            }

        }
        return redirect(route('dialogs'));
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
}
