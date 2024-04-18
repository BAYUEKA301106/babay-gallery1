<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <img src="{{ asset('images/G.png') }}" alt="Logo"
            style="width: 80px; height: 80px; margin-right: 10px;">
        <a class="navbar-brand" href="#"> GalleryQ|</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link " aria-current="page" href="/albums">My Albums</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/albums/create">Create Albums</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/all">All foto</a>
                </li>
            </ul>
        </div>
        <!-- Right Side Of Navbar -->
        <div class="navbar-nav ml-auto">
            <!-- Authentication Links -->
            @guest
                @if (Route::has('login'))
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                @endif

                @if (Route::has('register'))
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                @endif
            @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                            style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
        </div>
    </div>
</nav>
