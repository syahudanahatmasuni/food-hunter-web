<!-- Navbar -->
<div class="container">
    <nav class="row navbar navbar-expand-lg navbar-light bg-transparent ">
        <a href="{{ url('/') }}" class="navbar-brand">
            <img src="{{ url('frontend/images/logo/logo.png') }}" alt="Logo FOODHUNT">
        </a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
            data-target="#navb">
            <span class="navbar-toggler-icon">
            </span>
        </button>       

        <div class="collapse navbar-collapse" id="navb">
            <ul class="navbar-nav ml-auto mr-3">
                <li class="nav-item mx-md-2"><a href="{{ route('home') }}" class="nav-link {{ ($active === "home") ? 'active' : ''}} {{ ($isAuth === 'auth') ? 'text-success' : ''}}">Home</a></li>
                <li class="nav-item mx-md-2"><a href="{{ route('go-hunt') }}" class="nav-link {{ ($active === "gohunt") ? 'active' : ''}} {{ ($isAuth === 'auth') ? 'text-success' : ''}}">Go Hunt</a></li>
                <li class="nav-item mx-md-2"><a href="{{ route('tempat-makan') }}" class="nav-link {{ ($active === "foodplaces") ? 'active' : ''}} {{ ($isAuth === 'auth') ? 'text-success' : ''}}">Tempat Makan</a></li>
                <li class="nav-item mx-md-2"><a href="{{ route('favorite') }}" class="nav-link {{ ($active === "favorite") ? 'active' : ''}} {{ ($isAuth === 'auth') ? 'text-success' : ''}}">Favorite</a></li>
            </ul>

            @guest           
            <!-- Mobile Button -->
            <form class="form-inline d-sm-block d-md-none">
                {{-- $active is undefined --}}
                <button class="btn btn-login my-2 my-sm-0" type="button" onclick="event.preventDefault(); location.href='{{ url('login') }}'">
                    Masuk
                </button>
            </form>

            <!-- Destkop Button -->
            <form class="form-inline my-2 my-lg-0 d-none d-md-block">
                {{-- $active is undefined --}}
                <button class="btn btn-login btn-navbar-right my-2 my-sm-0 px-4" type="button" onclick="event.preventDefault(); location.href='{{ url('login') }}'">
                    Masuk
                </button>
            </form>
            @endguest

            @auth
                @if (Auth::user()->roles == 'ADMIN')
                <!-- Mobile Button -->
                <form class="form-inline d-sm-block d-md-none" action="{{ route('dashboard') }}">
                    <button class="btn btn btn-primary my-2 my-sm-0">
                        @csrf
                        Admin Mode
                    </button>
                </form>

                <!-- Destkop Button -->
                <form class="form-inline my-2 my-lg-0 d-none d-md-block" action="{{ route('dashboard') }}">
                    <button class="btn btn btn-primary mx-2 my-2 my-sm-0 px-4">
                        @csrf
                        Admin Mode
                    </button>
                </form>
                @endif

                <!-- Mobile Button -->
                <form class="form-inline d-sm-block d-md-none" action="{{ url('logout') }}" method="POST">
                    <button class="btn btn-danger my-2 my-sm-0" type="submit">
                        @csrf
                        Keluar ({{ Auth::user()->username }})
                    </button>
                </form>

                <!-- Destkop Button -->
                <form class="form-inline my-2 my-lg-0 d-none d-md-block" action="{{ url('logout') }}" method="POST">
                    <button class="btn btn-danger btn-navbar-right my-2 my-sm-0 px-4" type="submit">
                        @csrf
                        Keluar ({{ Auth::user()->username }})
                    </button>
                </form>
            @endauth
        </div>
    </nav>
</div>