<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="{{ asset('js/main.js') }}" ></script>
        <!-- Fonts -->
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    </head>
    <body>
        <div id="app">    
            <nav class="navbar navbar-expand-md navbar-dark bg-dark " id="BarraFooter">
                <div class="container">
                    <a class="navbar-brand letrasNav" href="{{ url('/') }}">
                        EN LA PERA
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
                            <a href="{{route('home')}}" class="nav-link letrasNav">Inicio</a>
                            <a href="{{route('publication.bar')}}"class="nav-link letrasNav" >Bares</a>
                            <a href="{{route('publication.boliche')}}"class="nav-link letrasNav" >Boliches</a>
                            <li class="nav-item">
                                <a class="nav-link letrasNav" href="{{ route('login') }}">{{ __('Iniciar Sesion') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link letrasNav" href="{{ route('register') }}">{{ __('Registrarse') }}</a>
                            </li>

                            @else

                            <a href="{{route('home')}}" class="nav-link letrasNav">Inicio</a>
                            <a href="{{route('publication.bar')}}"class="nav-link letrasNav" >Bares</a>
                            <a href="{{route('publication.boliche')}}"class="nav-link letrasNav" >Boliches</a>

                            <li class="nav-item dropdown ">
                                <a id="navbarDropdown" class=" letrasNav nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right " id="BarraFooter" aria-labelledby="navbarDropdown">

                                    @if(Auth::user()->role=='bar')
                                    <a class="dropdown-item letrasNav" href="{{route('publication.create')}}">
                                        Subir Publicacion
                                    </a>
                                    @endif
                                    <a class="dropdown-item letrasNav" href="{{ route('config') }}">
                                        Configuracion
                                    </a>
                                    <a class="dropdown-item letrasNav" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                           document.getElementById('logout-form').submit();">
                                        {{ __('Cerrar sesion') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
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
                @yield('content')
            </main>
        </div>

        <footer class="  footer bg-dark letrasNav "id="BarraFooter">
            <div class="container ">
                <p class="text-center ">
                    Copyright &copy; ELP
                </p>
            </div>

        </footer>
    </body>
</html>
