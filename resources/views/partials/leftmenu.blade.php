<?php ?>


<ul class="main-menu list-clear">
    <li class="main-menu__item"><a class="main-menu__link type-h3" href="{{ url('/profile/'.Auth::user()->name) }}"><span class="main-menu__icon main-menu__icon_home"></span><span class="main-menu__text">My page</span></a></li>
    <li class="main-menu__item"><a class="main-menu__link type-h3" href="{{ url('/dialog') }}"><span class="main-menu__icon main-menu__icon_mess"></span><span class="main-menu__text">Message</span></a></li>
    <li class="main-menu__item"><a class="main-menu__link type-h3" href="{{ url('/news') }}"><span class="main-menu__icon main-menu__icon_news"></span><span class="main-menu__text">News</span><!--<span class="main-menu__count">15</span>--></a></li>
    <li class="main-menu__item"><a class="main-menu__link type-h3" href="{{ url('/friends') }}"><span class="main-menu__icon main-menu__icon_friend"></span><span class="main-menu__text">Friends</span></a></li>
    <li class="main-menu__item"><a class="main-menu__link type-h3" href="{{ url('/statistics') }}"><span class="main-menu__icon main-menu__icon_static"></span><span class="main-menu__text">Statistics</span></a></li>
    <li class="main-menu__item"><a class="main-menu__link type-h3" href="{{ url('/skills/rating/1')}}"><span class="main-menu__icon main-menu__icon_skill"></span><span class="main-menu__text">Skills</span></a></li>
    <li class="main-menu__item"><a class="main-menu__link type-h3" href="{{ url('/search') }}"><span class="main-menu__icon main-menu__icon_search"></span><span class="main-menu__text">Search</span></a></li>
    <li class="main-menu__item"><a class="main-menu__link type-h3" href="{{ url('/profile/'.Auth::user()->name) }}/edit"><span class="main-menu__icon main-menu__icon_profile"></span><span class="main-menu__text">Profile</span></a></li>
</ul>
<hr class="separator-menu">
<ul class="info-menu list-clear">
    <li class="info-menu__item"><a class="info-menu__link type-h3" href="{{ url('/pages/howitworks') }}">How it Works</a></li>
    <li class="info-menu__item"><a class="info-menu__link type-h3" href="{{ url('/pages/faq') }}">FAQ</a></li>
    <li class="info-menu__item"><a class="info-menu__link type-h3" href="{{ url('/pages/aboutus') }}">About Us</a></li>
    <li class="info-menu__item"><a class="info-menu__link type-h3" href="{{ url('/pages/contactus') }}">Contact Us</a></li>
    <li class="info-menu__item"><a class="info-menu__link type-h3" href="{{ url('/pages/privacy_disclaimers') }}">Privacy / Disclaimers</a></li>
</ul>