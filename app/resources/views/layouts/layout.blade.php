<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', '自作製造') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    @yield('stylesheet')
</head>
<body>
    @if(Auth::check())
    <div>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('/mypage') }}">メルカリ</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{route('account', Auth::id()) }}">{{ Auth::user()->name }}</a>
                        </li>
                        <li class="nav-item">
                            <a id="logout" class="nav-link active" aria-current="page" href="{{ url('/') }}">ログアウト</a>
                            <form action="{{ route('logout') }}" method="post" style="display: none;" id="logout-form">
                                @csrf
                            </form>
                            <script>
                                document.getElementById('logout').addEventListener('click', function(event){
                                    event.preventDefault();
                                    document.getElementById('logout-form').submit();
                                });
                            </script>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('create.product') }}">
                                <button type="button" class="btn btn-danger">出品</button>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    @else
    <div>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('/') }}">メルカリ</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('login') }}">ログイン</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('register') }}">会員登録</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('create.product') }}">
                                <button type="button" class="btn btn-danger">出品</button>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    @endif
    @yield('content')
</body>
</html>