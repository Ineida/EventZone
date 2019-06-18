<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-32">
    {!! Html::style('lib/bootstrap/bootstrap.min.css') !!}
    {!! Html::style('css/formaweb.css')!!}

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Event Zone</title>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <title> @yield('titre_page')</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-warning  static-top">
    <div class="container ">
        <a class="navbar  " href="{{url('/Acueil')}}"><img src='{{asset('image/logo.jpg')}}' width="25%"/> </a>
        <a href="{{url('/Acueil')}}">Acueil <span></span></a>
                <a href="{{url("/listePrestataire")}}">Liste des prestataires</a>
                <a href="{{url("/InscrirePrestataire")}}">Ajouter un prestataire</a>
                <a href="{{url("/listeEtablissement")}}">Liste des etablissement</a>
                <a href="{{url("/InscrireEtablissement")}}">Ajouter un etablissement</a>


            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link text.success" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link text.success" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                           <a class="dropdown-item " href="{{url('/Client')}}/{{Auth::user()->id}}">Vous</a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>





</nav>
<header class="affiche">
    <h1> @yield('titre')</h1>
</header>
@yield('contenu')


<footer class="footer bg-secondary">
   Event Zone est un site web, créee par les élèves Ineida CARDOSO MORENO et Smailine VIRARAGAVANE, au vue d'une evaluation universitaire.
</footer>
{!! Html::script('lib/jquery/jquery-3.4.1.slim.min.js') !!}
{!! Html::script('lib/js/bootstrap.bundle.js') !!}
</body>
</html>