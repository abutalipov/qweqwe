<?php


$iam = Auth::user()->name == $user->name;
?>
@extends('layouts.inner')

@section('template_title')
    {{ $user->name }}'s Dialogs
@endsection


@section('innercontent')

    <div class="main-search main-search_dialog">
        <form class="main-search__form"><input class="main-search__input" type="text" placeholder="Search">
            <button class="main-search__icon main-search__icon_main"></button>
        </form>
    </div>
    <div class="p-table p-table_bg" id="table-dialog">
        <!--<div class="p-table__nav container-mobile">
            <div class="p-table__tab type-h2 type-h3_m p-table__tab_active">All</div>
            <div class="p-table__tab type-h2 type-h3_m">Unread</div>
        </div>-->
        <div class="p-table__content">
            <div class="p-table__content-item p-table__content-item_active" id="dialog-all">
                <div class="message">
                    @foreach($conversation_users as $conversation_user)

                        @if(!$conversation_user->trashed())
                            <? $conversation=$conversation_user->conversation  ?>
                        <a class="message__item" href="{{route('dialog.inner', ['conversation' => $conversation->id])}}">
                            @if($message = $conversation->messages->first())
                                <? $author = $message->user;
                                ?>
                            <div class="message__avatar"><img src="{{ $author->profile->avatar }}" alt=""></div>

                                <div class="message__content">
                                    <div class="message__personal-info">
                                        <div class="message__name type-h2 type-h3_m c-a">{{trim($message->user->first_name." ".$message->user->last_name)}}
                                            <div class="message__status"></div>
                                        </div>
                                        <div class="message__time c-g">{{$message->created_at->diffForHumans()}}</div>
                                    </div>
                                    <div class="message__personal-mess">
                                        <div class="message__text">{{$message->content}}</div>
                                        <!--<div class="message__count type-h3_m">15</div>-->
                                    </div>
                                </div>
                            @endif
                        </a>
                        @endif
                    @endforeach

                 </div>
            </div>
            <!--<div class="p-table__content-item" id="dialog-unread">
                <div class="message">
                    <a class="message__item" href="#">
                        <div class="message__avatar"><img src="img/_src/main-page/avatar.png" alt=""></div>
                        <div class="message__content">
                            <div class="message__personal-info">
                                <div class="message__name type-h2 type-h3_m c-a">Bill Edward
                                    <div class="message__status"></div>
                                </div>
                                <div class="message__time c-g">15:35</div>
                            </div>
                            <div class="message__personal-mess">
                                <div class="message__text">My name is Bill Edward, please listen my new song))) My name
                                    is Bill oyee
                                </div>
                                <div class="message__count type-h3_m">15</div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>-->
        </div>
    </div>


@endsection

@section('footer_scripts')

@endsection
