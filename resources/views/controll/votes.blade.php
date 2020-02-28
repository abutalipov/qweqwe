@extends('layouts.app')

@section('template_title')
Votes
@endsection

@section('head')
@endsection


<?php
echo 'loa...d';
return;
?>

@section('custom_topmenu')
<li >
    <a class="nav-link active" href="{{ route('controll_votes') }}">Голоса</a>
</li>
<li>
    <a class="nav-link" href="{{ route('controll_users') }}">Скиллы пользователей</a>
</li>

<li><button class="btn btn-outline-danger my-2 my-sm-0" >Удалить голоса</button></li>
<li><button class="btn btn-outline-success my-2 my-sm-0" >Пересчитать рейтинги</button></li>
@endsection


@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped ">
                <tr>
                    <th>Кто</th>
                    <th>Кому</th>
                    <th>Когда</th>
                    <th>Скилл</th>
                    <th>Вес</th>
                </tr>
                @foreach ($votes as $vote)
                <tr>
                    <td><b>{{$vote->voting_user->first_name}}</b> ({{$vote->voting_user->name}})</td>
                    <td><b>{{$vote->user->first_name}}</b> ({{$vote->user->name}})</td>
                    <td>{{$vote->created_at}}</td>
                    <td>{{$vote->skill->title}}</td>
                    <td>{{$vote->weight}}</td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>

@endsection