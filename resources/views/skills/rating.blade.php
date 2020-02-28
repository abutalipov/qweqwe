<?php
//$user->skills;
//$iam = Auth::user()->name == $user->name;
?>
@extends('layouts.innerfree')

@section('template_title')
Rating
@endsection


@section('innercontent')




<div class="p-table p-table_bg p-table_mg-mobile">
    <div class="p-table__header p-table__header_pd container-mobile type-h2 c-a type-h3_m">Skill viewer</div>
    <div class="p-table__content p-table__content_pd container-mobile">
        <div class="main-search main-search_middle main-search_add">
            <form class="main-search__form">
                <input class="main-search__input type-h3_m" type="text" placeholder="Search" value="{{$skill->title}}">
                <button class="main-search__icon main-search__icon_settings"></button>
                <button class="main-search__icon main-search__icon_main"></button>
            </form>
        </div><a class="browse-skill type-h3 c-g type-h4_m" href="#">Browse skills</a>
    </div>
</div>
<div class="top-users container-mobile">
    <div class="top-users__title type-h2 c-a type-h3_m">Top users</div>
    <div class="top-users__first">
        <ol class="top-users__list top-users__list_first list-clear">
            @foreach ($sus as $su)

            <li class="top-users__item"><a class="top-users__avatar" href="{{ url('/profile/'.$su->user->name) }}"><img src="{{$su->user->profile->avatar}}" alt=""></a>
                <div class="top-users__body"><a class="top-users__name type-h2 type-h3_m c-a" href="{{ url('/profile/'.$su->user->name) }}">{{$su->user->first_name ?? $su->user->name}}</a>
                    <div class="top-users__city type-h4_m">New-York, USA</div>
                    <div class="top-users__vote">
                        <div class="myskills__vote myskills__vote_normal type-h3_m">
                            <div class="myskills__vote-left">Vote</div>
                            <div class="myskills__vote-right">R:<span class="myskills__color">{{$su->rating}}</span></div>
                        </div>
                    </div>
                </div>
            </li>

            @break($loop->iteration == 3)
            @endforeach            
        </ol>
    </div>
    <div class="top-users__last">
        <ol class="top-users__list top-users__list_last list-clear">

            @foreach ($sus as $su)
            @continue($loop->iteration < 4)
            
            <li class="top-users__item"><a class="top-users__avatar" href="{{ url('/profile/'.$su->user->name) }}"><img src="{{$su->user->profile->avatar}}" alt=""></a>
                <div class="top-users__body"><a class="top-users__name type-h2 type-h3_m c-a" href="{{ url('/profile/'.$su->user->name) }}">{{$su->user->first_name ?? $su->user->name}}</a>
                    <div class="top-users__city type-h4_m">New-York, USA</div>
                    <div class="top-users__vote">
                        <div class="myskills__vote myskills__vote_normal type-h3_m">
                            <div class="myskills__vote-left">Vote</div>
                            <div class="myskills__vote-right">R:<span class="myskills__color">{{$su->rating}}</span></div>
                        </div>
                    </div>
                </div>
            </li>

            @break($loop->iteration > 12)
            @endforeach 

            
        </ol>
    </div>
</div>




@endsection

@section('footer_scripts')

@endsection
