@extends('layouts.app')

@section('template_title')
Users
@endsection

@section('head')
@endsection


@section('custom_topmenu')
<li >
    <a class="nav-link active" href="{{ route('controll_votes') }}">Голоса</a>
</li>
<li>
    <a class="nav-link" href="{{ route('controll_users') }}">Скиллы пользователей</a>
</li>

<li><a href="/controll/delete-votes"> <button class="btn btn-outline-danger my-2 my-sm-0" >Удалить голоса</button></a></li>
<li><button class="btn btn-outline-success my-2 my-sm-0" >Пересчитать рейтинги</button></li>
<li><button class="btn btn-outline-success my-2 my-sm-0" >Пересчитать веса</button></li>
<li><button class="btn btn-outline-success my-2 my-sm-0" >Пересчитать единый</button></li>
@endsection


@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <table class="table table-sm">
                <tr>
                    <th>Пользователь</th>
                    <th>Скилл</th>
                    <th>Вес скила</th>
                    <th>Вес голоса</th>
                    <th>Рейтинг</th>

                </tr>
                @foreach ($users as $user)
                <tr>
                    <td colspan="4"><h4><b>{{$user->first_name}}</b> ({{$user->name}})</h4></td>
                </tr>

                @foreach ($user->skills as $skill)
                        <?
                        $votes = $skill->votes->where('skill_id', $skill->id)->where('user_id', $user->id);

                        $sw = $skill->overall_weight;
                        $usw = $skill->pivot->weight;
                        ?>
                <tr>
                    <td></td>
                    <td>{{$skill->title}}</td>
                    <td>{{$sw}}</td>
                    <td>{{$usw}}</td>
                    <td>{{$usw*$sw}}</td>
                </tr>
                @endforeach


                @endforeach
            </table>
        </div>
    </div>
</div>

@endsection