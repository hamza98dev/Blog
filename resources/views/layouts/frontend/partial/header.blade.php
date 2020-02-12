<header>
    <div class="container-fluid position-relative no-side-padding">

        <a href="{{ route('home') }}" class="logo"><img src="https://secteurprive.ma/assets/img/logo.png" width="50" height="50" alt=""></a>

        <div class="menu-nav-icon" data-nav-menu="#main-menu"><i class="ion-navicon"></i></div>

        <ul class="main-menu visible-on-click" id="main-menu">
            <li><a href="{{ route('home') }}">Accueil</a></li>
            <li><a href="{{ url('/categories') }}">Catégories</a></li>
            <li><a href="https://secteurprive.ma/appels-d-offres">Appels d'offre</a></li>
            <li><a href="https://secteurprive.ma/contact">Contact</a></li>

            @guest
                {{-- <li><a href="{{ route('login') }}">Login</a></li>
                <li><a href="{{ route('register') }}">Register</a></li> --}}
            @else
                @if(Auth::check() && Auth::user()->role->id == 1)
                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                @endif
                @if(Auth::check() && Auth::user()->role->id == 2)
                    <li><a href="{{ route('author.dashboard') }}">Dashboard</a></li>
                @endif
            @endguest
        </ul><!-- main-menu -->

        {{-- <div class="src-area">
            <form method="GET" action="{{ route('search') }}">
                <button class="src-btn" type="submit"><i class="ion-ios-search-strong"></i></button>
                <input class="src-input" value="{{ isset($query) ? $query : '' }}" name="query" type="text" placeholder="Search">
            </form>
        </div> --}}

    </div><!-- conatiner -->
</header>
