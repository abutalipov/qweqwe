<?php
$iam = Auth::user()->name == $user->name;
?>

@extends('layouts.zigrat2')

@section('template_title')
{{ Auth::user()->name }}'s' Homepage
@endsection


@section('content')

<div class="total-indent p-page">
    <div class="p-page-head">
        <h1 class="clear-margin p-page-head__title">{{$user->renderName}}</h1>
        <div class="p-page-head__status type-h3">Online</div>
    </div>
    <div class="p-page-col">
        <div class="p-page-col__menu">
            <div class="main-brief">
                <div class="main-avatar hidden-tablet"><img src="{{ $user->profile->avatar }}" alt=""></div>
                @if (!$iam)
                <div class="action-friend ">                   

                    @switch($user->friendStatus)
                    @case(0)
                    <a class="btn btn_accent btn_add" href="{{ url('/addfriend/'.$user->name) }}"><span class="btn-icon btn-icon_addfriend"></span>Add friend</a>
                    @break
                    @case(1)
                    Add friend: Waiting for an answer                                
                    @break
                    @case(2)
                    Your subscriber
                    <a class="btn btn_accent btn_add" href="{{ url('/addfriend/'.$user->name) }}"><span class="btn-icon btn-icon_addfriend"></span>Be friends!</a>                    
                    @break
                    @case(3)
                    You are friends
                    @break
                    @endswitch
                    <a class="btn btn_border" href="{{route('dialog.inner',['conversation'=>$user->conversation()->id])}}"><span class="btn-icon btn-icon_send"></span>Send message</a>
                    <br/>
                    <!--<a class="btn btn_border" href="{{ url('/authfor/'.$user->name) }}"><span class=""></span>Login</a>-->
                </div>
                @endif
                
                @include('partials.leftmenu', ['free' => false])

            </div>
        </div>
        <div class="p-page-col__main">
            @yield('innercontent')
        </div>
    </div>
</div>

@endsection
