@extends('layouts.zigrat2')

@section('template_title')
{{ Auth::user()->name }}'s' Homepage
@endsection


@section('content')

<div class="total-indent p-page">
    <div class="p-page-head">
        <h1 class="clear-margin p-page-head__title">Bill Edward</h1>
        <div class="p-page-head__status type-h3">Online</div>
    </div>
    <div class="p-page-col">
        <div class="p-page-col__menu">
            <div class="main-brief">
                <div class="main-avatar hidden-tablet"><img src="/z/img/_src/main-page/avatar.png" alt=""></div>
                <div class="action-friend hidden">
                    <button class="btn btn_accent"><span class="btn-icon action-friend__icon-add"></span>Add friend</button>
                    <button class="btn btn_border"><span class="btn-icon action-friend__icon-send"></span>Send message</button>
                </div>
                <ul class="main-menu list-clear">
                    <li class="main-menu__item"><a class="main-menu__link type-h3" href="mypage.html"><span class="main-menu__icon main-menu__icon_home"></span><span class="main-menu__text">My page</span></a></li>
                    <li class="main-menu__item"><a class="main-menu__link type-h3" href="dialog.html"><span class="main-menu__icon main-menu__icon_mess"></span><span class="main-menu__text">Message</span></a></li>
                    <li class="main-menu__item"><a class="main-menu__link type-h3" href="#"><span class="main-menu__icon main-menu__icon_news"></span><span class="main-menu__text">News</span><span class="main-menu__count">15</span></a></li>
                    <li class="main-menu__item"><a class="main-menu__link type-h3" href="page-friend.html"><span class="main-menu__icon main-menu__icon_friend"></span><span class="main-menu__text">Friends</span></a></li>
                    <li class="main-menu__item"><a class="main-menu__link type-h3" href="static.html"><span class="main-menu__icon main-menu__icon_static"></span><span class="main-menu__text">Statistics</span></a></li>
                    <li class="main-menu__item"><a class="main-menu__link type-h3" href="page-skill.html"><span class="main-menu__icon main-menu__icon_skill"></span><span class="main-menu__text">Skills</span></a></li>
                    <li class="main-menu__item"><a class="main-menu__link type-h3" href="search.html"><span class="main-menu__icon main-menu__icon_search"></span><span class="main-menu__text">Search</span></a></li>
                    <li class="main-menu__item"><a class="main-menu__link type-h3" href="setting.html"><span class="main-menu__icon main-menu__icon_profile"></span><span class="main-menu__text">Profile</span></a></li>
                </ul>
                <hr class="separator-menu">
                <ul class="info-menu list-clear">
                    <li class="info-menu__item"><a class="info-menu__link type-h3" href="#">How it Works</a></li>
                    <li class="info-menu__item"><a class="info-menu__link type-h3" href="#">FAQ</a></li>
                    <li class="info-menu__item"><a class="info-menu__link type-h3" href="#">About Us</a></li>
                    <li class="info-menu__item"><a class="info-menu__link type-h3" href="#">Contact Us</a></li>
                    <li class="info-menu__item"><a class="info-menu__link type-h3" href="#">Privacy / Disclaimers</a></li>
                </ul>
                <div class="mobile-menu">
                    <div class="mobile-menu__btn">
                        <div class="mobile-menu__icon"></div>
                    </div>
                    <div class="mobile-menu__content">
                        <header class="header">
                            <div class="container container-mobile">
                                <div class="header__content">
                                    <div class="header__left">
                                        <div class="logo">
                                            <div class="logo__icon"></div>
                                            <div class="logo__text"></div>
                                        </div>
                                        <div class="search-head">
                                            <form class="search-head__form">
                                                <input class="search-head__input" type="text" placeholder="Searching">
                                                <button class="search-head__btn"></button>
                                            </form>
                                            <div class="search-head__result">
                                                <ul class="search-head__list list-clear">
                                                    <li class="search-head__item"><a class="search-head__link" href="#">Jake Miller</a></li>
                                                    <li class="search-head__item"><a class="search-head__link" href="#">Holy Mouse</a></li>
                                                    <li class="search-head__item"><a class="search-head__link" href="#">Frenk Smit</a></li>
                                                    <li class="search-head__item"><a class="search-head__link" href="#">Frenki Smit</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="profile-head">
                                        <div class="profile-head__info">
                                            <div class="profile-head__name type-h3_m">Bill Edward</div>
                                            <div class="profile-head__avatar"><img src="/z/img/_src/header/Intersect.png" alt=""></div>
                                        </div>
                                        <div class="profile-head__menu">
                                            <ul class="profile-head__list list-clear">
                                                <li class="profile-head__item"><a class="profile-head__link" href="#">My profile</a></li>
                                                <li class="profile-head__item"><a class="profile-head__link" href="#">Settings</a></li>
                                                <li class="profile-head__item"><a class="profile-head__link" href="#">Exit</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </header><a class="mobile-menu-profile" href="#">
                            <div class="mobile-menu-profile__avatar"><img src="/z/img/_src/main-page/avatar.png" alt=""></div>
                            <div class="mobile-menu-profile__name type-h1 c-a type-h1_m">Bill Edward</div></a>
                        <div class="mobile-menu-list">
                            <ul class="main-menu main-menu_mobile list-clear">
                                <li class="main-menu__item"><a class="main-menu__link type-h3 type-h3_m" href="dialog.html"><span class="main-menu__icon main-menu__icon_mess"></span>
                                        <div class="main-menu__border"><span class="main-menu__text">Message</span>
                                        </div></a></li>
                                <li class="main-menu__item"><a class="main-menu__link type-h3 type-h3_m" href="#"><span class="main-menu__icon main-menu__icon_news"></span>
                                        <div class="main-menu__border"><span class="main-menu__text">News</span><span class="main-menu__count">15</span>
                                        </div></a></li>
                                <li class="main-menu__item"><a class="main-menu__link type-h3 type-h3_m" href="page-friend.html"><span class="main-menu__icon main-menu__icon_friend"></span>
                                        <div class="main-menu__border"><span class="main-menu__text">Friends</span>
                                        </div></a></li>
                                <li class="main-menu__item"><a class="main-menu__link type-h3 type-h3_m" href="static.html"><span class="main-menu__icon main-menu__icon_static"></span>
                                        <div class="main-menu__border"><span class="main-menu__text">Statistics</span>
                                        </div></a></li>
                                <li class="main-menu__item"><a class="main-menu__link type-h3 type-h3_m" href="page-skill.html"><span class="main-menu__icon main-menu__icon_skill"></span>
                                        <div class="main-menu__border"><span class="main-menu__text">Skills</span>
                                        </div></a></li>
                                <li class="main-menu__item"><a class="main-menu__link type-h3 type-h3_m" href="search.html"><span class="main-menu__icon main-menu__icon_search"></span>
                                        <div class="main-menu__border"><span class="main-menu__text">Search</span>
                                        </div></a></li>
                                <li class="main-menu__item"><a class="main-menu__link type-h3 type-h3_m" href="setting.html"><span class="main-menu__icon main-menu__icon_profile"></span>
                                        <div class="main-menu__border"><span class="main-menu__text">Settings</span>
                                        </div></a></li>
                            </ul>
                            <ul class="info-menu info-menu_mobile list-clear">
                                <li class="info-menu__item"><a class="info-menu__link type-h3 type-h3_m" href="#">How it Works</a></li>
                                <li class="info-menu__item"><a class="info-menu__link type-h3 type-h3_m" href="#">FAQ</a></li>
                                <li class="info-menu__item"><a class="info-menu__link type-h3 type-h3_m" href="#">About Us</a></li>
                                <li class="info-menu__item"><a class="info-menu__link type-h3 type-h3_m" href="#">Contact Us</a></li>
                                <li class="info-menu__item"><a class="info-menu__link type-h3 type-h3_m" href="#">Privacy / Disclaimers</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="p-page-col__main">
            <div class="p-mobile">
                <div class="container-mobile">
                    <div class="p-mobile__body">
                        <div class="p-mobile__avatar"><img src="/z/img/_src/main-page/avatar.png" alt=""></div>
                        <div class="p-mobile__content">
                            <div class="p-mobile__name type-h1 c-a type-h2_m">Bill Edward</div>
                            <div class="p-mobile__rating type-h2 type-h3_m"><span class="c-g">Overall rating: </span><span class="c-a">4,5</span></div>
                            <div class="p-mobile__about">
                                <ul class="list-me list-clear">
                                    <li class="list-me__item">
                                        <div class="list-me__title type-h3 type-h4_m">Birthday:</div>
                                        <div class="list-me__val type-h4_m">17 May 1990</div>
                                    </li>
                                    <li class="list-me__item">
                                        <div class="list-me__title type-h3 type-h4_m">Сity:</div>
                                        <div class="list-me__val type-h4_m">New-York</div>
                                    </li>
                                </ul>
                            </div>
                            <div class="p-mobile__col"><a class="p-mobile__see type-h3 type-h4_m c-a" href="#">See more</a>
                                <div class="p-mobile__share">
                                    <div class="p-mobile__icon show-mobile"></div>
                                    <div class="about-rating__title type-h2 c-g hidden-mobile">Share: </div>
                                    <div class="about-rating__val">
                                        <div class="about-rating__icon-bl"><a class="about-rating__icon about-rating__icon_fb" href="#"></a><a class="about-rating__icon about-rating__icon_in" href="#"></a><a class="about-rating__icon about-rating__icon_tw" href="#"></a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="myskill-mobile show-tablet">
                <div class="myskill-mobile__title container-mobile type-h2 c-a type-h3_m">My skills</div>
                <div class="myskill-mobile__content">
                    <div class="myskills myskills_mobile"><a class="myskills__item" href="#">
                            <div class="myskills__title type-h3 type-h3_m">Music</div>
                            <div class="myskills__content">
                                <div class="myskills__bg"></div>
                                <div class="myskills__img"><img src="/z/img/_src/main-page/skill-1.png" alt="">
                                </div>
                                <div class="myskills__vote">
                                    <div class="myskills__vote-left type-h3_m">Vote</div>
                                    <div class="myskills__vote-right type-h3_m">R:<span class="myskills__color">15</span></div>
                                </div>
                            </div></a><a class="myskills__item" href="#">
                            <div class="myskills__title type-h3 type-h3_m">Workout</div>
                            <div class="myskills__content">
                                <div class="myskills__bg"></div>
                                <div class="myskills__img"><img src="/z/img/_src/main-page/skill-2.png" alt="">
                                </div>
                                <div class="myskills__vote">
                                    <div class="myskills__vote-left type-h3_m">Vote</div>
                                    <div class="myskills__vote-right type-h3_m">R:<span class="myskills__color">15</span></div>
                                </div>
                            </div></a><a class="myskills__item" href="#">
                            <div class="myskills__title type-h3 type-h3_m">Classic dance anouther</div>
                            <div class="myskills__content">
                                <div class="myskills__bg"></div>
                                <div class="myskills__img"><img src="/z/img/_src/main-page/skill-3.png" alt="">
                                </div>
                                <div class="myskills__vote">
                                    <div class="myskills__vote-left type-h3_m">Vote</div>
                                    <div class="myskills__vote-right type-h3_m">R:<span class="myskills__color">15</span></div>
                                </div>
                            </div></a><a class="myskills__item" href="#">
                            <div class="myskills__title type-h3 type-h3_m">Music</div>
                            <div class="myskills__content">
                                <div class="myskills__bg"></div>
                                <div class="myskills__img"><img src="/z/img/_src/main-page/skill-1.png" alt="">
                                </div>
                                <div class="myskills__vote">
                                    <div class="myskills__vote-left type-h3_m">Vote</div>
                                    <div class="myskills__vote-right type-h3_m">R:<span class="myskills__color">15</span></div>
                                </div>
                            </div></a><a class="myskills__item" href="#">
                            <div class="myskills__title type-h3 type-h3_m">Workout</div>
                            <div class="myskills__content">
                                <div class="myskills__bg"></div>
                                <div class="myskills__img"><img src="/z/img/_src/main-page/skill-2.png" alt="">
                                </div>
                                <div class="myskills__vote">
                                    <div class="myskills__vote-left type-h3_m">Vote</div>
                                    <div class="myskills__vote-right type-h3_m">R:<span class="myskills__color">15</span></div>
                                </div>
                            </div></a>
                    </div>
                </div>
            </div>
            <div class="about-mobile">
                <div class="container-mobile">
                    <div class="about-me">
                        <div class="about-me__item">
                            <ul class="list-me list-clear">
                                <li class="list-me__item">
                                    <div class="list-me__title type-h3 type-h3_m">Mail:</div>
                                    <div class="list-me__val type-h4_m">zikkurat@gmail.com</div>
                                </li>
                                <li class="list-me__item">
                                    <div class="list-me__title type-h3 type-h3_m">Facebook:</div>
                                    <div class="list-me__val type-h4_m">Bill Edward</div>
                                </li>
                                <li class="list-me__item">
                                    <div class="list-me__title type-h3 type-h3_m">Twitter:</div>
                                    <div class="list-me__val type-h4_m">@bill_edward</div>
                                </li>
                                <li class="list-me__item">
                                    <div class="list-me__title type-h3 type-h3_m">About me:</div>
                                    <div class="list-me__val type-h4_m">Time, it needs time, To win back your love again, I will be there, I will be there. Оnly love, Can bring back your love someday, I will be there, I will be there. Fight, babe, I'll fight, to win back your love again, I will be there, I will be there.</div>
                                </li>
                            </ul>
                        </div>
                        <div class="about-me__item about-rating">
                            <div class="about-rating__col">
                                <div class="about-rating__text-str type-h2 type-h2_m c-g" id="about-rat-info"><span class="about-rating__title">Overall rating:</span><span class="about-rating__val c-a">4,5</span></div>
                                <div class="about-rating__text-str">
                                    <div class="p-mobile__icon show-mobile"></div>
                                    <div class="about-rating__title type-h2 c-g hidden-mobile">Share: </div>
                                    <div class="about-rating__val">
                                        <div class="about-rating__icon-bl"><a class="about-rating__icon about-rating__icon_fb" href="#"></a><a class="about-rating__icon about-rating__icon_in" href="#"></a><a class="about-rating__icon about-rating__icon_tw" href="#"></a></div>
                                    </div>
                                </div>
                            </div>
                            <div class="about-rating__col">
                                <ul class="about-rating__list list-clear type-h3 type-h3_m" id="about-rat-list">
                                    <li class="about-rating__list-item c-g">Russian<span class="about-rating__accent c-a">7 th</span></li>
                                    <li class="about-rating__list-item c-g">Ufa<span class="about-rating__accent c-a">2 nd</span></li>
                                    <li class="about-rating__list-item c-g">Moscow<span class="about-rating__accent c-a">3 rd</span></li>
                                    <li class="about-rating__list-item c-g">S.Peterburg<span class="about-rating__accent c-a">5 th</span></li>
                                </ul>
                            </div>
                        </div>
                        <div class="about-me__item rating-skill">
                            <div class="rating-skill__title type-h2 type-h2_m c-g">Rating by skill</div>
                            <div class="rating-skill__list">
                                <div class="rating-skill__item">
                                    <div class="rating-skill__col-info">
                                        <div class="rating-skill__img"><img src="/z/img/_src/main-page/skill-1.png" alt=""></div>
                                        <div class="rating-skill__name type-h2 type-h2_m c-a">Music</div>
                                    </div>
                                    <div class="rating-skill__col-total">
                                        <ul class="about-rating__list list-clear type-h3 type-h3_m">
                                            <li class="about-rating__list-item about-rating__list-item_total"><span class="about-rating__total type-h2 type-h2_m c-a">40</span></li>
                                            <li class="about-rating__list-item c-g">Russian<span class="about-rating__accent c-a">7 th</span></li>
                                            <li class="about-rating__list-item c-g">Ufa<span class="about-rating__accent c-a">2 nd</span></li>
                                            <li class="about-rating__list-item c-g">Moscow<span class="about-rating__accent c-a">3 rd</span></li>
                                            <li class="about-rating__list-item c-g">S.Peterburg<span class="about-rating__accent c-a">5 th</span></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="rating-skill__item">
                                    <div class="rating-skill__col-info">
                                        <div class="rating-skill__img"><img src="/z/img/_src/main-page/skill-2.png" alt=""></div>
                                        <div class="rating-skill__name type-h2 type-h2_m c-a">Dance</div>
                                    </div>
                                    <div class="rating-skill__col-total">
                                        <ul class="about-rating__list list-clear type-h3 type-h3_m">
                                            <li class="about-rating__list-item about-rating__list-item_total"><span class="about-rating__total type-h2 type-h2_m c-a">45</span></li>
                                            <li class="about-rating__list-item c-g">Russian<span class="about-rating__accent c-a">7 th</span></li>
                                            <li class="about-rating__list-item c-g">Ufa<span class="about-rating__accent c-a">2 nd</span></li>
                                            <li class="about-rating__list-item c-g">Moscow<span class="about-rating__accent c-a">3 rd</span></li>
                                            <li class="about-rating__list-item c-g">S.Peterburg<span class="about-rating__accent c-a">5 th</span></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="rating-skill__item">
                                    <div class="rating-skill__col-info">
                                        <div class="rating-skill__img"><img src="/z/img/_src/main-page/skill-3.png" alt=""></div>
                                        <div class="rating-skill__name type-h2 type-h2_m c-a">Workout</div>
                                    </div>
                                    <div class="rating-skill__col-total">
                                        <ul class="about-rating__list list-clear type-h3 type-h3_m">
                                            <li class="about-rating__list-item about-rating__list-item_total"><span class="about-rating__total type-h2 type-h2_m c-a">55</span></li>
                                            <li class="about-rating__list-item c-g">Russian<span class="about-rating__accent c-a">7 th</span></li>
                                            <li class="about-rating__list-item c-g">Ufa<span class="about-rating__accent c-a">2 nd</span></li>
                                            <li class="about-rating__list-item c-g">Moscow<span class="about-rating__accent c-a">3 rd</span></li>
                                            <li class="about-rating__list-item c-g">S.Peterburg<span class="about-rating__accent c-a">5 th</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="p-table p-table_bg hidden-tablet" id="table-skill">
                <div class="p-table__nav">
                    <div class="p-table__tab type-h2">My skills</div>
                    <div class="p-table__tab type-h2 p-table__tab_active">About me</div>
                </div>
                <div class="p-table__content p-table__content_pd">
                    <div class="p-table__content-item" id="myskils">
                        <div class="myskills"><a class="myskills__item" href="#">
                                <div class="myskills__title type-h3">Music</div>
                                <div class="myskills__content">
                                    <div class="myskills__bg"></div>
                                    <div class="myskills__img"><img src="/z/img/_src/main-page/skill-1.png" alt="">
                                    </div>
                                    <div class="myskills__vote">
                                        <div class="myskills__vote-left">Vote</div>
                                        <div class="myskills__vote-right">R:<span class="myskills__color">15</span></div>
                                    </div>
                                </div></a><a class="myskills__item" href="#">
                                <div class="myskills__title type-h3">Workout</div>
                                <div class="myskills__content">
                                    <div class="myskills__bg"></div>
                                    <div class="myskills__img"><img src="/z/img/_src/main-page/skill-2.png" alt="">
                                    </div>
                                    <div class="myskills__vote">
                                        <div class="myskills__vote-left">Vote</div>
                                        <div class="myskills__vote-right">R:<span class="myskills__color">15</span></div>
                                    </div>
                                </div></a><a class="myskills__item" href="#">
                                <div class="myskills__title type-h3">Classic dance anouther</div>
                                <div class="myskills__content">
                                    <div class="myskills__bg"></div>
                                    <div class="myskills__img"><img src="/z/img/_src/main-page/skill-3.png" alt="">
                                    </div>
                                    <div class="myskills__vote">
                                        <div class="myskills__vote-left">Vote</div>
                                        <div class="myskills__vote-right">R:<span class="myskills__color">15</span></div>
                                    </div>
                                </div></a>
                            <div class="myskills__all">
                                <button class="btn btn_accent btn_more">All skills</button>
                            </div>
                        </div>
                        <div class="myskills-footer hidden">
                            <div class="myskills-footer__item">
                                <div class="myskills-footer__icon"></div>
                                <div class="myskills-footer__text">Vote for skill</div>
                            </div>
                            <div class="myskills-footer__item">
                                <div class="myskills-footer__icon"></div>
                                <div class="myskills-footer__text">Add to favorites</div>
                            </div>
                        </div>
                    </div>
                    <div class="p-table__content-item p-table__content-item_active" id="aboutme">
                        <div class="about-me">
                            <div class="about-me__item">
                                <ul class="list-me list-clear">
                                    <li class="list-me__item">
                                        <div class="list-me__title type-h3">Birthday:</div>
                                        <div class="list-me__val">17 May 1990</div>
                                    </li>
                                    <li class="list-me__item">
                                        <div class="list-me__title type-h3">Сity:</div>
                                        <div class="list-me__val">New-York</div>
                                    </li>
                                </ul>
                                <div class="about-me__more type-h3" id="about-more">See more</div>
                                <ul class="list-me list-clear list-me_hidden">
                                    <li class="list-me__item">
                                        <div class="list-me__title type-h3">Mail:</div>
                                        <div class="list-me__val">zikkurat@gmail.com</div>
                                    </li>
                                    <li class="list-me__item">
                                        <div class="list-me__title type-h3">Facebook:</div>
                                        <div class="list-me__val">Bill Edward</div>
                                    </li>
                                    <li class="list-me__item">
                                        <div class="list-me__title type-h3">Twitter:</div>
                                        <div class="list-me__val">@bill_edward</div>
                                    </li>
                                    <li class="list-me__item">
                                        <div class="list-me__title type-h3">About me:</div>
                                        <div class="list-me__val">Time, it needs time, To win back your love again, I will be there, I will be there. Оnly love, Can bring back your love someday, I will be there, I will be there. Fight, babe, I'll fight, to win back your love again, I will be there, I will be there.</div>
                                    </li>
                                </ul>
                            </div>
                            <div class="about-me__item about-rating">
                                <div class="about-rating__col">
                                    <div class="about-rating__text-str type-h2 c-g" id="about-rat-info"><span class="about-rating__title">Overall rating:</span><span class="about-rating__val c-a">4,5</span></div>
                                    <div class="about-rating__text-str">
                                        <div class="about-rating__title type-h2 c-g">Share: </div>
                                        <div class="about-rating__val">
                                            <div class="about-rating__icon-bl"><a class="about-rating__icon about-rating__icon_fb" href="#"></a><a class="about-rating__icon about-rating__icon_in" href="#"></a><a class="about-rating__icon about-rating__icon_tw" href="#"></a></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="about-rating__col">
                                    <ul class="about-rating__list list-clear type-h3" id="about-rat-list">
                                        <li class="about-rating__list-item c-g">Russian<span class="about-rating__accent c-a">7 th</span></li>
                                        <li class="about-rating__list-item c-g">Ufa<span class="about-rating__accent c-a">2 nd</span></li>
                                        <li class="about-rating__list-item c-g">Moscow<span class="about-rating__accent c-a">3 rd</span></li>
                                        <li class="about-rating__list-item c-g">S.Peterburg<span class="about-rating__accent c-a">5 th</span></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="about-me__item rating-skill">
                                <div class="rating-skill__title type-h2 c-g">Rating by skill</div>
                                <div class="rating-skill__list">
                                    <div class="rating-skill__item">
                                        <div class="rating-skill__col-info">
                                            <div class="rating-skill__img"><img src="/z/img/_src/main-page/skill-1.png" alt=""></div>
                                            <div class="rating-skill__name type-h2 c-a">Music</div>
                                        </div>
                                        <div class="rating-skill__col-total">
                                            <ul class="about-rating__list list-clear type-h3">
                                                <li class="about-rating__list-item about-rating__list-item_total"><span class="about-rating__total type-h2 c-a">40</span></li>
                                                <li class="about-rating__list-item c-g">Russian<span class="about-rating__accent c-a">7 th</span></li>
                                                <li class="about-rating__list-item c-g">Ufa<span class="about-rating__accent c-a">2 nd</span></li>
                                                <li class="about-rating__list-item c-g">Moscow<span class="about-rating__accent c-a">3 rd</span></li>
                                                <li class="about-rating__list-item c-g">S.Peterburg<span class="about-rating__accent c-a">5 th</span></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="rating-skill__item">
                                        <div class="rating-skill__col-info">
                                            <div class="rating-skill__img"><img src="/z/img/_src/main-page/skill-2.png" alt=""></div>
                                            <div class="rating-skill__name type-h2 c-a">Dance</div>
                                        </div>
                                        <div class="rating-skill__col-total">
                                            <ul class="about-rating__list list-clear type-h3">
                                                <li class="about-rating__list-item about-rating__list-item_total"><span class="about-rating__total type-h2 c-a">45</span></li>
                                                <li class="about-rating__list-item c-g">Russian<span class="about-rating__accent c-a">7 th</span></li>
                                                <li class="about-rating__list-item c-g">Ufa<span class="about-rating__accent c-a">2 nd</span></li>
                                                <li class="about-rating__list-item c-g">Moscow<span class="about-rating__accent c-a">3 rd</span></li>
                                                <li class="about-rating__list-item c-g">S.Peterburg<span class="about-rating__accent c-a">5 th</span></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="rating-skill__item">
                                        <div class="rating-skill__col-info">
                                            <div class="rating-skill__img"><img src="/z/img/_src/main-page/skill-3.png" alt=""></div>
                                            <div class="rating-skill__name type-h2 c-a">Workout</div>
                                        </div>
                                        <div class="rating-skill__col-total">
                                            <ul class="about-rating__list list-clear type-h3">
                                                <li class="about-rating__list-item about-rating__list-item_total"><span class="about-rating__total type-h2 c-a">55</span></li>
                                                <li class="about-rating__list-item c-g">Russian<span class="about-rating__accent c-a">7 th</span></li>
                                                <li class="about-rating__list-item c-g">Ufa<span class="about-rating__accent c-a">2 nd</span></li>
                                                <li class="about-rating__list-item c-g">Moscow<span class="about-rating__accent c-a">3 rd</span></li>
                                                <li class="about-rating__list-item c-g">S.Peterburg<span class="about-rating__accent c-a">5 th</span></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="write-post">
                <textarea class="write-post__input type-h4_m" id="writepost" name="" placeholder="Anything share?"></textarea>
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
            </div>
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
                    <div class="p-table__content-item" id="allposts">
                        <div class="post-item container-mobile">
                            <div class="post-author">
                                <div class="post-author__col-info">
                                    <div class="post-author__avatar"><img src="/z/img/_src/main-page/avatar.png" alt=""></div>
                                    <div class="post-author__info">
                                        <div class="post-author__name type-h2 type-h2_m c-a">Bill Edward</div>
                                        <div class="post-author__time type-h3 type-h4_m c-b">Yestarday, 10 am</div>
                                        <div class="post-author__status type-h3 type-h4_m c-b">Online</div>
                                    </div>
                                </div>
                                <div class="post-author__action"><a class="post-author__edit" href="#">
                                        <div class="post-author__edit-text type-h3 c-b hidden-mobile">Edit</div>
                                        <div class="post-author__icon-edit"></div></a><a class="post-author__view" href="#">
                                        <div class="post-author__view-text type-h4_m c-b">253</div>
                                        <div class="post-author__icon-view"></div></a></div>
                            </div>
                            <div class="post-content">
                                <h2>Look at my new level skill! </h2>
                                <p>My name is Bill Edward, please listen my new song)))</p>
                                <div class="post-content__gallery">
                                    <div class="post-content__gallery-accent"><img src="/z/img/_src/main-page/post.png" alt=""><img src="/z/img/_src/main-page/post.png" alt=""></div>
                                    <div class="post-content__gallery-mini"><img src="/z/img/_src/main-page/post.png" alt=""><img src="/z/img/_src/main-page/post.png" alt=""><img src="/z/img/_src/main-page/post.png" alt=""><img src="/z/img/_src/main-page/post.png" alt=""><img src="/z/img/_src/main-page/post.png" alt=""><img src="/z/img/_src/main-page/post.png" alt=""><img src="/z/img/_src/main-page/post.png" alt=""></div>
                                </div>
                            </div>
                            <div class="post-footer"><a class="post-footer__item" href="#">
                                    <div class="post-footer__icon-comment"></div>
                                    <div class="post-footer__count type-h4_m">112</div></a><a class="post-footer__item" href="#">
                                    <div class="post-footer__icon-stars"></div>
                                    <div class="post-footer__count type-h4_m">253</div></a><a class="post-footer__item" href="#">
                                    <div class="post-footer__icon-repost"></div>
                                    <div class="post-footer__count type-h4_m">253</div></a></div>
                        </div>
                    </div>
                    <div class="p-table__content-item p-table__content-item_active" id="myposts">
                        <div class="post-item container-mobile">
                            <div class="post-author">
                                <div class="post-author__col-info">
                                    <div class="post-author__avatar"><img src="/z/img/_src/main-page/avatar.png" alt=""></div>
                                    <div class="post-author__info">
                                        <div class="post-author__name type-h2 type-h2_m c-a">Bill Edward</div>
                                        <div class="post-author__time type-h3 type-h4_m c-b">Yestarday, 10 am</div>
                                        <div class="post-author__status type-h3 type-h4_m c-b">Online</div>
                                    </div>
                                </div>
                                <div class="post-author__action"><a class="post-author__edit" href="#">
                                        <div class="post-author__edit-text type-h3 c-b hidden-mobile">Edit</div>
                                        <div class="post-author__icon-edit"></div></a><a class="post-author__view" href="#">
                                        <div class="post-author__view-text type-h4_m c-b">253</div>
                                        <div class="post-author__icon-view"></div></a></div>
                            </div>
                            <div class="post-content">
                                <h2>Look at my new level skill! </h2>
                                <p>My name is Bill Edward, please listen my new song)))</p>
                                <div class="post-content__gallery">
                                    <div class="post-content__gallery-accent"><img src="/z/img/_src/main-page/post.png" alt=""><img src="/z/img/_src/main-page/post.png" alt=""></div>
                                    <div class="post-content__gallery-mini"><img src="/z/img/_src/main-page/post.png" alt=""><img src="/z/img/_src/main-page/post.png" alt=""><img src="/z/img/_src/main-page/post.png" alt=""><img src="/z/img/_src/main-page/post.png" alt=""><img src="/z/img/_src/main-page/post.png" alt=""><img src="/z/img/_src/main-page/post.png" alt=""><img src="/z/img/_src/main-page/post.png" alt=""></div>
                                </div>
                            </div>
                            <div class="post-footer"><a class="post-footer__item" href="#">
                                    <div class="post-footer__icon-comment"></div>
                                    <div class="post-footer__count type-h4_m">112</div></a><a class="post-footer__item" href="#">
                                    <div class="post-footer__icon-stars"></div>
                                    <div class="post-footer__count type-h4_m">253</div></a><a class="post-footer__item" href="#">
                                    <div class="post-footer__icon-repost"></div>
                                    <div class="post-footer__count type-h4_m">253</div></a></div>
                            <div class="post-comments">
                                <div class="post-comments__item"><a class="post-comments__avatar" href="#"><img src="/z/img/_src/main-page/avatar.png" alt=""></a>
                                    <div class="post-comments__content">
                                        <div class="post-comments__info"><a class="post-comments__title type-h2 type-h2_m c-a" href="#">Bill Edward</a>
                                            <div class="post-comments__time c-g">15:35</div>
                                        </div>
                                        <div class="post-comments__text">
                                            <p>My name is Bill Edward, please listen my new song))) My name is Bill Edward, please listen my new song)))</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="post-comments__item"><a class="post-comments__avatar" href="#"><img src="/z/img/_src/main-page/avatar.png" alt=""></a>
                                    <div class="post-comments__content">
                                        <div class="post-comments__info"><a class="post-comments__title type-h2 type-h2_m c-a" href="#">Michael Bay</a>
                                            <div class="post-comments__time c-g">15:35</div>
                                        </div>
                                        <div class="post-comments__text">
                                            <p>My name is Bill Edward, please listen my new song))) My name is Bill Edward, please listen my new song)))</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="post-comments__item"><a class="post-comments__avatar" href="#"><img src="/z/img/_src/main-page/avatar.png" alt=""></a>
                                    <div class="post-comments__content">
                                        <div class="post-comments__info"><a class="post-comments__title type-h2 type-h2_m c-a" href="#">Michael Bay</a>
                                            <div class="post-comments__time c-g">15:35</div>
                                        </div>
                                        <div class="post-comments__text">
                                            <p>My name is Bill Edward, please listen my new song))) My name is Bill Edward, please listen my new song)))</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="post-comments__item"><a class="post-comments__avatar" href="#"><img src="/z/img/_src/main-page/avatar.png" alt=""></a>
                                    <div class="post-comments__content">
                                        <div class="post-comments__info"><a class="post-comments__title type-h2 type-h2_m c-a" href="#">Bill Edward</a>
                                            <div class="post-comments__time c-g">15:35</div>
                                        </div>
                                        <div class="post-comments__text">
                                            <p>My name is Bill Edward, please listen my new song)))</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="post-comments__item"><a class="post-comments__avatar" href="#"><img src="/z/img/_src/main-page/avatar.png" alt=""></a>
                                    <div class="post-comments__content">
                                        <div class="post-comments__info"><a class="post-comments__title type-h2 type-h2_m c-a" href="#">Bill Edward</a>
                                            <div class="post-comments__time c-g">15:35</div>
                                        </div>
                                        <div class="post-comments__text">
                                            <p>My name is Bill Edward, please listen my new song))) My name is Bill Edward, please listen my new song)))</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="post-comments-write container-mobile">
                                    <div class="post-comments-write__avatar post-comments__avatar"><img src="/z/img/_src/main-page/avatar.png" alt=""></div>
                                    <div class="post-comments-write__inp-wrap">
                                        <input class="post-comments-write__input type-h4_m" name="" placeholder="Write a message...">
                                        <div class="post-comments-write__smile"></div>
                                    </div>
                                    <div class="post-comments-write__send"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
