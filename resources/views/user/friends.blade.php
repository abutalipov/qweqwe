<?php
$user->friends;

#dd($user);

//echo $user->friendStatus//

#$iam =  Auth::user()->name == $user->name;

?>
@extends('layouts.inner')

@section('template_title')
My Friends
@endsection


@section('innercontent')

@if($user->friends->count())
<div class="p-table p-table_bg">
    <div class="p-table__header p-table__header_pd type-h2 c-a hidden-tablet">My Friends</div>
    <div class="p-table__content p-table__content_pd">
        <div class="vote-users">
                        
            <ul class="vote-users__list list-clear">

                @foreach($user->friends as $frendUser)
                @if (!$frendUser->profile)                    
                @continue
                @endif

                <li class="vote-users__item"><a class="vote-users__avatar" href="{{ url('/profile/'.$frendUser->name) }}"><img src="{{$frendUser->profile->avatar}}" alt=""></a>
                    <div class="vote-users__body">
                        <div class="vote-users__left"><a class="vote-users__name type-h2 c-a type-h3_m" href="{{ url('/profile/'.$frendUser->name) }}">{{$frendUser->first_name ?? $frendUser->name}}</a>
                            <div class="NOvote-users__cat"> {{ $frendUser->skills->pluck('title')->implode(', ') }} </div>
                        </div>
                        <div class="vote-users__right">
                            <div class="vote-users__date c-g">{{$frendUser->profile->location}}</div>
                            <div class="vote-users__count type-h3 c-a type-h3_m"></div>
                        </div>
                    </div>
                </li>

                @endforeach

            </ul>
        </div>
    </div>
</div>

@else
<tr>
    <td colspan="3">You have no friends yet. <a href="{{ url('/search') }}">Find friends</a></td>
</tr>
@endif

@endsection

@section('footer_scripts')

@endsection
