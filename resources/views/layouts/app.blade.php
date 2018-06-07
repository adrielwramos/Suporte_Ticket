<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Sistema de Tickets') }}</title>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- DataTable Scripts -->
        {{-- <script src="DataTables/datatables.min.js"></script> --}}
        <!-- Fonts -->
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        {{-- <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css"> --}}
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        @yield('custom_css')
        {{-- <link rel="stylesheet" href="DataTables/datatables.min.css"> --}}
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.9/css/all.css" integrity="sha384-5SOiIsAziJl6AWe0HWRKTXlfcSHKmYV4RBF18PPJ173Kzn7jzMyFuTtk8JA7QQG1" crossorigin="anonymous">

    </head>
    <body>
        <div id="app">
            <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
                            <li><a class="nav-link" href="{{ url('/') }}">{{ __('Dashboard') }}</a></li>
                            <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                            <li><a class="nav-link" href="{{ route('register') }}">{{ __('Cadastrar Usuário') }}</a></li>
                            @else

                            <li><a href="{{ url('/home') }}" class="nav-link"><span class="fa fa-home"> Dashboard</span></a></li>

                            @if(Auth::user()->isAdmin())
                            <li><a href="{{ route('tickets.index') }}" class="nav-link"><span class="fa fa-ticket-alt"> Todos os Tickets</span></a></li>
                            @endif
                            @if(Auth::user()->isUser())
                            <li><a href="{{ route('tickets.index') }}" class="nav-link"><span class="fa fa-ticket-alt"> Meus Tickets</span></a></li>
                            @endif


                            <li><a href="{{ route('tickets.create') }}" class="nav-link"><span class="fa fa-plus"> Abrir Ticket</span></a></li>

                            @if(Auth::user()->isAdmin())
                            <li><a href="{{ route('users.index') }}" class="nav-link"><span class="fa fa-users"> Usuários</span></a></li>
                            @endif

                            <li class="nav-item">
                                <button type="button" class="btn btn-warning" disabled>
                                    {{ Auth::user()->name }} <span class="badge badge-light"><i class="fas fa-user"> </i></span>
                                </button>
                            </li>
                            <li>
                                <a class="nav-link" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
    document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt"></i>  {{ __('Sair') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
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
        @yield('custom_js')
    </body>
</html>
