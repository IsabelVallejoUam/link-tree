<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
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
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Redes Sociales
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('socialNetworks.index') }}"><i
                                            class="far fa-list-alt"></i> Listar</a>
                                    <a class="dropdown-item" href="{{ route('socialNetworks.create') }}"><i
                                            class="fas fa-plus"></i> Agregar</a>
                                </div>

                            </li>

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Enlaces
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('links.index') }}"><i
                                            class="far fa-list-alt"></i> Listar</a>
                                    <a class="dropdown-item" href="{{ route('links.create') }}"><i
                                            class="fas fa-plus"></i> Agregar</a>
                                </div>
                            </li>

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <img src="/images/{{Auth::user()->profile_photo}}" style="width:20px; height20px; float:left; border-radius:50% margin-right:25px;" class="avatar">{{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                    {{-- <a class="dropdown-item" href="{{ route('user.{email}', auth()->user()->email) }}"><i class="fas fa-plus"></i> Ver Perfil</a>
                                    <a class="dropdown-item" href="{{ route('user.edit', auth()->user()->email) }}"><i class="fas fa-profile"></i>
                                        Editar Perfil</a>
                                    <a class="dropdown-item" href="{{ route('user.show', auth()->user()->email)}}"><i class="fas fa-eye"></i>
                                        Ver Informacion de Perfil</a>
                                    <a class="dropdown-item" href="{{ route('user.destroy', auth()->user()->email) }}"><i
                                            class="fas fa-plus"></i> Eliminar Perfil</a>
                                            
                                    --}} <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                        <i class="fas fa-sign-out-alt"></i> {{ __('Logout') }}
                                    </a> 

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div class="container">
                @if (Session::has('_success'))
                    <div class="alert alert-success">
                        {{ Session::get('_success') }}
                    </div>
                @endif
                @if (Session::has('_failure'))
                    <div class="alert alert-danger">
                        {{ Session::get('_failure') }}
                    </div>
                @endif
            </div>

            @yield('content')
        </main>
    </div>
</body>

</html>
