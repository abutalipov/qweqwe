<?php
$user->skills;
$user->walls;
//echo $user->friendStatus//

$iam = Auth::user()->name == $user->name;
?>
@extends('layouts.inner')

@section('template_title')
    {{ $user->name }}'s Profile
@endsection


@section('innercontent')


    <div class="p-table p-table_bg hidden-tablet" id="table-skill">
        <div class="p-table__nav">
            <div class="p-table__tab type-h2  p-table__tab_active">My skills</div>
            <div class="p-table__tab type-h2">About me</div>
        </div>
        <div class="p-table__content p-table__content_pd">
            <div class="p-table__content-item p-table__content-item_active" id="myskils">
            <!--<skills :user='{{Auth::User()}}' :otheruser='{{$user}}'></skills>-->
                <div class="myskills">
                    @if(true)
                        @foreach($user->skills as $skill)
                            <?
                            $votes = $skill->votes->where('skill_id', $skill->id)->where('user_id', $user->id);
                            ?>
                            <div class="myskills__item">
                                <div class="myskills__title type-h3">{{$skill->title}}</div>
                                <div class="myskills__content">
                                    <div class="myskills__bg"></div>
                                    <div class="myskills__img"><img src="/images/noimage1.png" alt=""></div>
                                    <div class="myskills__vote" style="z-index: 10;">

                                        @if(!$iam)
                                            @if($votes->where('voting_user_id',Auth::user()->id)->count()>0)
                                                <div class="myskills__vote-left">Voted</div>
                                            @else
                                                <div class="myskills__vote-left"><a style="z-index: 10; color:white;"
                                                                                    href="{{route('skills.vote',['skill'=>$skill->id,'user'=>$user->id])}}">Vote</a>
                                                </div>
                                            @endif
                                        @else
                                            <div class="myskills__vote-left"><s>Vote</s></div>
                                        @endif
                                        <?
                                        $sw = $skill->overall_weight;
                                        $usw = $skill->pivot->weight;
                                        ?>
                                        <div class="myskills__vote-right">R:<span
                                                    class="myskills__color">{{$sw*$usw}}</span></div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                    <div class="myskills__all">
                        <button class="btn btn_accent btn_more">All skills</button>
                    </div>
                </div>
            </div>
            <div class="p-table__content-item " id="aboutme">
                <div class="about-me">
                    <div class="about-me__item">
                        <ul class="list-me list-clear">
                            @if($user->profile->birthday)
                                <li class="list-me__item">
                                    <div class="list-me__title type-h3">Birthday:</div>
                                    <div class="list-me__val">{{date('d M Y', strtotime($user->profile->birthday))}}</div>
                                </li>
                            @endif

                            @if($user->profile->city or $user->profile->country)
                                <li class="list-me__item">
                                    <div class="list-me__title type-h3">Сity:</div>
                                    <div class="list-me__val">{{$user->profile->city}} ({{$user->profile->country}})
                                    </div>
                                </li>
                            @endif
                        </ul>
                        <div class="about-me__more type-h3" id="about-more">See more</div>
                        <ul class="list-me list-clear list-me_hidden">
                            @if($user->email)
                                <li class="list-me__item">
                                    <div class="list-me__title type-h3">Mail:</div>
                                    <div class="list-me__val">{{$user->email}}</div>
                                </li>
                            @endif

                            @if($user->profile->github_username)
                                <li class="list-me__item">
                                    <div class="list-me__title type-h3">Github:</div>
                                    <div class="list-me__val">{{$user->profile->github_username}}</div>
                                </li>
                            @endif

                            @if($user->profile->twitter_username)
                                <li class="list-me__item">
                                    <div class="list-me__title type-h3">Twitter:</div>
                                    <div class="list-me__val">{{$user->profile->twitter_username}}</div>
                                </li>
                            @endif
                            @if($user->profile->facebook_username)
                                <li class="list-me__item">
                                    <div class="list-me__title type-h3">Facebook:</div>
                                    <div class="list-me__val">{{$user->profile->facebook_username}}</div>
                                </li>
                            @endif

                            @if($user->profile->bio)
                                <li class="list-me__item">
                                    <div class="list-me__title type-h3">About me:</div>
                                    <div class="list-me__val">{{$user->profile->bio}}</div>
                                </li>
                            @endif
                        </ul>
                    </div>
                    <div class="about-me__item about-rating">
                        <div class="about-rating__col">
                            <div class="about-rating__text-str type-h2 c-g" id="about-rat-info"><span
                                        class="about-rating__title">Overall rank:</span><span
                                        class="about-rating__val c-a">{{$user->overall_rating}}</span></div>
                            <div class="about-rating__text-str">
                                <div class="about-rating__title type-h2 c-g">Share:</div>
                                <div class="about-rating__val">
                                    <div class="about-rating__icon-bl">
                                        <a class="about-rating__icon about-rating__icon_fb"
                                           href="https://www.facebook.com/sharer/sharer.php?u={{Request::url()}}"></a>
                                        <a class="about-rating__icon about-rating__icon_in"
                                           href="https://www.linkedin.com/shareArticle?mini=true&url={{Request::url()}}"></a>
                                        <a class="about-rating__icon about-rating__icon_tw"
                                           href="http://twitter.com/share?url={{urlencode(Request::url())}}"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="about-rating__col">
                            <ul class="about-rating__list list-clear type-h3" id="about-rat-list">
                                @if(!is_null($user->r_0))
                                    <li class="about-rating__list-item c-g">Total Skill Rank<span
                                                class="about-rating__accent c-a">{{str_ordinal($user->r_0)}}</span></li>
                                @endif
                                @if(!is_null($user->r_1))
                                    <li class="about-rating__list-item c-g">Rank by {{$user->profile->country}}<span
                                                class="about-rating__accent c-a">{{str_ordinal($user->r_1)}}</span></li>
                                @endif
                                @if(!is_null($user->r_2))
                                    <li class="about-rating__list-item c-g">Rank by {{$user->profile->city}}<span
                                                class="about-rating__accent c-a">{{str_ordinal($user->r_2)}}</span></li>
                                @endif
                                @if(!is_null($user->r_3))
                                    <li class="about-rating__list-item c-g">Rank by {{$user->profile->administrative}}
                                        <span class="about-rating__accent c-a">{{str_ordinal($user->r_3)}}</span></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                    <div class="about-me__item rating-skill">
                        <div class="rating-skill__title type-h2 c-g">Rank by Skill</div>
                        <div class="rating-skill__list">

                            @foreach ($user->skills as $skill)
                                <div class="rating-skill__item">
                                    <div class="rating-skill__col-info">
                                        <div class="rating-skill__img"><img src="/images/noimage1.png"
                                                                            alt=""></div>
                                        <div class="rating-skill__name type-h2 c-a">{{$skill->title}}</div>
                                    </div>
                                    <div class="rating-skill__col-total">
                                        <ul class="about-rating__list list-clear type-h3">
                                            @if(!is_null($skill->pivot->r_0))
                                                <li class="about-rating__list-item c-g">Total Skill Rank<span
                                                            class="about-rating__accent c-a">{{str_ordinal($skill->pivot->r_0)}}</span>
                                                </li>
                                            @endif
                                            @if(!is_null($skill->pivot->r_1))
                                                <li class="about-rating__list-item c-g">Rank
                                                    by {{$user->profile->country}}<span
                                                            class="about-rating__accent c-a">{{str_ordinal($skill->pivot->r_1)}}</span>
                                                </li>
                                            @endif
                                            @if(!is_null($skill->pivot->r_2))
                                                <li class="about-rating__list-item c-g">Rank by {{$user->profile->city}}
                                                    <span
                                                            class="about-rating__accent c-a">{{str_ordinal($skill->pivot->r_2)}}</span>
                                                </li>
                                            @endif
                                            @if(!is_null($skill->pivot->r_3))
                                                <li class="about-rating__list-item c-g">Rank
                                                    by {{$user->profile->administrative}}
                                                    <span class="about-rating__accent c-a">{{str_ordinal($skill->pivot->r_3)}}</span>
                                                </li>
                                        @endif

                                    </div>
                                </div>
                            @endforeach


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="write-post">
        {{ Form::open(['url' => '/profile/'.$user->name.'/newpost', 'method' => 'put']) }}

        <textarea class="write-post__input type-h4_m" id="writepost" name="content"
                  placeholder="Anything to share?"></textarea>
        <div class="write-post__action">
            <div class="write-post__icon write-post__icon_vote"></div>
            <div class="write-post__icon write-post__icon_photo"></div>
            <div class="write-post__icon write-post__icon_video"></div>
            <div class="write-post__icon write-post__icon_file"></div>
            <div class="write-post__icon write-post__icon_text"></div>
        </div>
        <div class="write-post__smile"></div>
        <div class="write-post__footer container-mobile">
            <div class="write-post__action">
                <div class="write-post__icon write-post__icon_vote"></div>
                <div class="write-post__icon write-post__icon_photo"></div>
                <div class="write-post__icon write-post__icon_video"></div>
                <div class="write-post__icon write-post__icon_file"></div>
                <div class="write-post__icon write-post__icon_text"></div>
                <div class="write-post__icon write-post__icon_settings"></div>
            </div>
            <div class="write-post__btn">
                <button class="btn btn_accent type-h3_m">Publish</button>
            </div>
        </div>
        {{ Form::close() }}
    </div>


    @if ($user->walls->count())
        <div class="p-table" id="table-post">
            <div class="p-table__nav container-mobile">
                <div class="p-table__tab type-h2 type-h3_m">All posts</div>
                <div class="p-table__tab type-h2 type-h3_m p-table__tab_active">My posts</div>
                <div class="p-table-search">
                    <div class="p-table-search__write">
                        <input class="post-comments-write__input type-h4_m" name="" placeholder="Write a search...">
                    </div>
                    <div class="p-table-search__input"></div>
                </div>
            </div>
            <div class="p-table__content">

                @foreach($user->walls as $wall)
                    @if (!$user->profile)
                        @continue
                    @endif
                    <div class="p-table__content-item p-table__content-item_active" id="myposts">
                        <div class="post-item container-mobile">
                            <div class="post-author">
                                <div class="post-author__col-info">
                                    <div class="post-author__avatar"><img src="{{$wall->user->profile->avatar}}" alt="">
                                    </div>
                                    <div class="post-author__info">
                                        <div class="post-author__name type-h2 type-h2_m c-a">{{$wall->user->renderName}}</div>
                                        <div class="post-author__time type-h3 type-h4_m c-b">{{ $wall->created_at->diffForHumans() }}</div>
                                        <div class="post-author__status type-h3 type-h4_m c-b">Online</div>
                                    </div>
                                </div>
                                <div class="post-author__action"><a class="post-author__edit" href="#">
                                        <div class="post-author__edit-text type-h3 c-b hidden-mobile">Edit</div>
                                        <div class="post-author__icon-edit"></div>
                                    </a><a class="post-author__view" href="#">
                                        <div class="post-author__view-text type-h4_m c-b">253</div>
                                        <div class="post-author__icon-view"></div>
                                    </a></div>
                            </div>
                            <div class="post-content">

                                {{$wall->content}}

                            </div>
                            <div class="post-footer">
                                <a class="post-footer__item" href="#">
                                    <div class="post-footer__icon-comment"></div>
                                    <div class="post-footer__count type-h4_m">{{$wall->children->count()}}</div>
                                </a>
                                <a class="post-footer__item" href="#">
                                    <div class="post-footer__icon-stars"></div>
                                    <div class="post-footer__count type-h4_m">253</div>
                                </a>
                                <a class="post-footer__item" href="#">
                                    <div class="post-footer__icon-repost"></div>
                                    <div class="post-footer__count type-h4_m">253</div>
                                </a>
                            </div>


                            <div class="post-comments">

                                @foreach($wall->children as $child)
                                    <div class="post-comments__item"><a class="post-comments__avatar" href="#"><img
                                                    src="{{$child->user->profile->avatar}}" alt=""></a>
                                        <div class="post-comments__content">
                                            <div class="post-comments__info"><a
                                                        class="post-comments__title type-h2 type-h2_m c-a"
                                                        href="#">{{$child->user->renderName}}</a>
                                                <div class="post-comments__time c-g">{{ $child->created_at->diffForHumans() }}</div>
                                            </div>
                                            <div class="post-comments__text">
                                                <p>
                                                    {{$child->content}}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                                {{ Form::open(['url' => '/post/'.$wall->id.'/new-comment', 'method' => 'put','class'=>'post-comments-write container-mobile']) }}


                                <div class="post-comments-write__avatar post-comments__avatar"><img
                                            src="{{$wall->user->profile->avatar}}" alt=""></div>
                                <div class="post-comments-write__inp-wrap"><input
                                            class="post-comments-write__input type-h4_m" name="content"
                                            placeholder="Write a message...">
                                    <div class="post-comments-write__smile"></div>
                                </div>

                                <input type="submit" value="" style="border:none;" class="post-comments-write__send"/>

                                {{ Form::close() }}
                            </div>


                        </div>

                    </div>
                @endforeach
            </div>
        </div>
    @endif

@endsection

@section('footer_scripts')

@endsection
