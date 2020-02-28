<header class="header">
    <div class="container container-mobile">
        <div class="header__content">
            <div class="header__left">
                <a href="/home">
                <div class="logo">
                    <div class="logo__icon"></div>
                    <div class="logo__text"></div>
                </div>
                </a>
                <div class="search-head">
                    <form class="search-head__form"  action="{{route('search')}}" method="GET">
                        <input class="search-head__input" type="text" placeholder="Search" name="q" value="{{ old('q') }}">
                        <button type="submit" class="search-head__btn"></button>
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
                    <div class="profile-head__name type-h3_m">{{ Auth::user()->name }}</div>
                    <div class="profile-head__avatar"><img src="{{ Auth::user()->profile->avatar }}" alt=""></div>
                </div>
                <div class="profile-head__menu">
                    <ul class="profile-head__list list-clear">
                        <li class="profile-head__item"><a class="profile-head__link" href="{{ url('/profile/'.Auth::user()->name) }}">My page</a></li>
                        <li class="profile-head__item"><a class="profile-head__link" href="{{ url('/profile/'.Auth::user()->name) }}/edit">Settings</a></li>
                        <li class="profile-head__item"><a class="profile-head__link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">Exit</a></li>
                    </ul>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>
