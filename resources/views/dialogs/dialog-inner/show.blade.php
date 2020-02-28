<?php
$iam = Auth::user()->name == $user->name;
?>
@extends('layouts.inner')
@section('template_title')
    {{ $user->name }}'s Dialogs
@endsection

@section('innercontent')
    <div class="p-table p-table_bg" id="table-dialog">
        <div class="p-table__header container-mobile">
            <div class="mymess-head">
                <a class="mymess-head__back type-h3 type-h4_m c-g" href="{{route('dialogs')}}">Back</a>
                @foreach($users as $cuser)
                <a class="mymess-head__title type-h2 type-h3_m c-a" href="{{route('profile.show',['profile'=>$cuser->user->name])}}">
                    <div class="message__status message__status_left"></div>
                            {{$cuser->user->name}}
                </a>
                @endforeach
                <a class="mymess-head__delet" href="{{route('dialog.clear',['conversation'=>$conversation_id])}}">
                </a>
            </div>
        </div>
        <div class="p-table__content">
            <div class="message message_inner">
                @foreach($messages as $message)
                    <? $author = $message->user;
                    ?>
                    <div class="message__item message__item_inner message__item_inner-active">
                        <a class="message__avatar" href="{{route('profile.show',['profile'=>$author->name])}}">
                            <img src="{{ $author->profile->avatar }}" alt="">
                        </a>
                        <div class="message__content">
                            <div class="message__personal-info">
                                <a class="message__name" href="{{route('profile.show',['profile'=>$author->name])}}">
                                    <span class="type-h2 type-h3_m c-a">{{$author->name}}</span>
                                </a>
                                <div class="message__time c-g">{{$message->created_at->diffForHumans()}}</div>
                            </div>
                            <div class="message__personal-mess">
                                <div class="message__inner-text">{{$message->content}}</div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="p-table__footer container-mobile">
            {{ Form::open(['url' => '/dialog/'.$conversation_id, 'method' => 'put','class'=>'message-write']) }}


                <div class="message-write__inp-wrap">
                    <input class="post-comments-write__input" value="{{$user->id}}" type="hidden" name="user" >
                    <input class="post-comments-write__input" name="message" placeholder="Write a message...">
                    <div class="post-comments-write__smile"></div>
                </div>
            <input type="submit" value="" class="post-comments-write__send"/>
                {{ Form::close() }}

        </div>
    </div>
@endsection

@section('footer_scripts')

@endsection
