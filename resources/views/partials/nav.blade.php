<nav class="navbar navbar-expand-md navbar-light navbar-laravel">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/rooms') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                <li class="nav-item">
                    @if (Route::has('register'))
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    @endif
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @else

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>

            {{--  <li class="nav-item dropdown">
                <a id="navbarDropdownMenuLink" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </li>  --}}
        @endguest
    </ul>
</div>
</div>
</nav>

<ul class="nav nav-tabs">
    @hasanyrole('super-admin|employee')
    <li class="nav-item">
        <a class="{{ Request::url()== url('appointments') ? 'nav-link active' : 'nav-link' }}" href="{{ url('appointments') }}">Appointments</a>
    </li>
    <li class="nav-item">
        <a class="{{ Request::url()== url('beds') ? 'nav-link active' : 'nav-link' }}" href="{{ url('beds') }}">Beds</a>
    </li>
    <li class="nav-item">
        <a class="{{ Request::url()== url('rooms') ? 'nav-link active' : 'nav-link' }}" href="{{ url('rooms') }}">Rooms</a>
    </li>
    @endhasanyrole

    @role('patient')

    @endrole
  </ul>
