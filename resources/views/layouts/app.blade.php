<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=9">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> @isset ($title){{$title ." - "}} @endisset{{config('app.name', 'Icronica')}}</title>
    <meta name="description"
        content="{{$description??"Entre e siga os seus autores favoritos de perto, reviva as histórias mais interessantes, explore os artigos e blogs que se identifica, nos tópicos que adora sobre culinaria, tecnologia, entretenimento e muito mais! Icronica, o seu passatempo favorito. Chaves: Icronica - IconnicWS - cronicas - artigos - programação - tecnologia - culinaria - entretenimento - tutorial - dicas - truques"}}">
    <meta name="keywords"
        content="Icronica - IconnicWS - cronicas - artigos - programação - tecnologia - culinaria - entretenimento - tutorial - dicas - truques">
    <meta name="author" content="IconnicWS">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Styles for IE9 < -->
    <!--[if lt IE 10]>
	    <link href="{{ asset('css/ie.css') }}" rel="stylesheet">
    <![endif]-->
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand 	d-none d-md-block" href="{{ url('/') }}">
                    {{ config('app.name', 'Icronica') }}
                </a>
                <search></search>

                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="dropdown" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse multi-collapse navbar-collapse justify-content-end" id="navbarSupportedContent">

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav mr-0">
                        <!-- Authentication Links -->
                        @guest
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link  text-center d-none d-md-block" href="/a" v-pre><i
                                    class="fas fa-compass"></i></a>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link  text-center d-none d-md-block" href="#"
                                role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre><i
                                    class="fas fa-user"></i></a>

                            <div id="links_dropdown"
                                class="dropdown-menu dropdown-menu-right dropdown-menu-styless text-center d-block d-md-none"
                                aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('login') }}">{{ __('Entrar') }}</a>
                                <a class="dropdown-item" href="{{ route('register') }}">{{ __('Registar') }}</a>
                            </div>
                        </li>

                        @else

                        {{-- Others --}}
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link text-center d-none d-md-block btn btn-lg py-1"
                                href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                v-pre><i class="fas fa-compass"></i></span>
                            </a>

                            <div id="links_dropdown"
                                class="dropdown-menu dropdown-menu-right dropdown-menu-styless text-center d-block d-md-none"
                                aria-labelledby="navbarDropdown">
                                <div class="px-3">
                                    <p class="m-0 text-muted small" style="border-bottom: 1px solid #f1f1f1;">Explorar
                                    </p>
                                </div>
                                <a class="dropdown-item" href="/a">Artigos</a>
                                <a class="dropdown-item" href="/user">Seguir</a>
                            </div>
                        </li>
                        {{-- User --}}
                        <li class="nav-item dropdown order-first order-md-last" style="border-top: 1px solid #f1f1f1;">
                            <a id="navbarDropdown" class="nav-link text-center d-none d-md-block btn btn-lg py-1"
                                href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                v-pre><i class="fas fa-user"></i></span>
                            </a>

                            <div id="links_dropdown"
                                class="dropdown-menu dropdown-menu-right dropdown-menu-styless text-center d-block d-md-none"
                                aria-labelledby="navbarDropdown">
                                <a class="dropdown-item px-1 " href="/user/{{ Auth::user()->id }}">
                                    <div class="container py-3">
                                        <div class="row" style="min-width: 14rem;">
                                            <div class="col-2 pl-1 pr-0">
                                                <img class="img-fluid rounded-circle"
                                                    src="{{Auth::user()->default_image()}}" alt="Perfil">
                                            </div>
                                            <div class="col-8 col-md-10 px-1">
                                                <p class="m-0">{{Auth::user()->name}}</p>
                                                <p class="m-0">{{Auth::user()->career}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <div class="px-3">
                                    <p class="m-0 text-muted small" style="border-bottom: 1px solid #f1f1f1;">Artigos
                                    </p>
                                </div>
                                <a class="dropdown-item" href="/a/create">Criar Artigo</a>
                                <a class="dropdown-item" href="/user/a/{{Auth::user()->id}}">Meus Artigos</a>
                                <div class="px-3 mt-2">
                                    <p class="m-0 text-muted small" style="border-bottom: 1px solid #f1f1f1;">Perfil</p>
                                </div>


                                <a class="dropdown-item" href="/user/edit">Editar</a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn dropdown-item">{{ __('Sair') }}</button>
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

    <script type="text/javascript">
        window.onsubmit = function () {
            if (document.querySelector('.form-changes')) {
                window.submited = true;
            }
        };

        window.onbeforeunload = function () {
            console.log(window.submited)
            if (window.submited != true && document.querySelector('.form-changes')) {
                return "As mudanças deste formulário não seram salvas. Deseja sair?";
            }
            window.submited = null;
        };
        window.unload = function () {
            window.submited = null;
        };

    </script>

    @if(!isset($ads))
    <div class="ads ads-list ads-md"><script src="//z-na.amazon-adsystem.com/widgets/onejs?MarketPlace=US&adInstanceId=7a091b4e-0c70-4ca3-93fd-c6699673d729"></script></div>
    @endif
    


    {{-- Add Blocker Check --}}
    <div id="fmdIYpJqbsnA" class="ads-modal-content bg-light" style="position: fixed;top: 0;left: 0;width: 100%;height: 100%;z-index: 10000;">
            <div class="ads-modal-body text-center" style="margin-top: 10%;">
                <p class="display-3 text-danger">Ad Bloker Detectado</p>
                <p class="text-muted" style="
font-size: 2rem;
">
Sabemos que é chato <br> mas custa apenas <b class="text-danger">1 segundo</b>! Por favor, desative o <b class="text-danger">Bloqueador de anúncios</b> e recarregue a página!</p>
                <p class="text-muted" style="
font-size: 1.5rem;
">Se não fazemos como os motoristas em Portugal e vamos todos de férias!</p>
            </div>
        </div>
      
      <script src="/js/ads.js" type="text/javascript"></script>
      <script type="text/javascript">
      
      if(!document.getElementById('DMbISjKEvxcB')){
        document.getElementById('fmdIYpJqbsnA').style.display='block';
      }
      
      </script>
</body>

</html>
