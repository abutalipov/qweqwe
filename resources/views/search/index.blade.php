@extends('layouts.innerfree')

@section('template_title')
Rating
@endsection


@section('innercontent')


<div class="search-page container-mobile">
    <form class="search-page__form" action="{{route('search')}}" method="GET">
        <div class="main-search">
            <div class="main-search__form">
                <input class="main-search__input type-h3_m" type="text" placeholder="Search" name="q" value="{{ old('q') }}">
                <button type="submit" class="main-search__icon main-search__icon_main"></button>
            </div>
        </div>
        @if (false)
        <div class="search-page__setting">
            <div class="form-group-column">                
                <div class="form-group form-group_col">
                    <select class="form-group__select form-group__select_big" name="">
                        <option value="">Country</option>
                    </select>
                </div>
            </div>            
        </div>
        @endif
    </form>
</div>

@if($users->count())
<div class="p-table p-table_bg">
    <div class="p-table__header p-table__header_pd type-h2 c-a hidden-tablet">Result</div>
    <div class="p-table__content p-table__content_pd">
        <div class="vote-users">
            <ul class="vote-users__list list-clear">

                @foreach($users as $user)
                @if (!$user->profile)
                @continue
                @endif

                <li class="vote-users__item"><a class="vote-users__avatar" href="{{ url('/profile/'.$user->name) }}"><img src="{{$user->profile->avatar}}" alt=""></a>
                    <div class="vote-users__body">
                        <div class="vote-users__left" ><a class="vote-users__name type-h2 c-a type-h3_m" href="{{ url('/profile/'.$user->name) }}">{{$user->first_name ?? $user->name}}</a>
                            <div class="vote-users__cat"> {{ $user->skills->pluck('title')->implode(', ') }} </div>
                        </div>
                        <div class="vote-users__right">
                            <div class="vote-users__date c-g">{{$user->profile->location}}</div>
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
    <td colspan="3">Result not found.</td>
</tr>
@endif



@endsection

@section('footer_scripts')

@endsection
