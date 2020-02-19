<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <!-- CSEF Token -->
        {{-- 次 --}}
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        {{-- 各ページごとにtitleタグを入れるために@yieldで空けておきます。--}}
        <title>@yield('title')</title>
        
        <!--scripts -->
        {{-- Laravel標準で用意されているjavascriptを読み込みます　--}}
        <script src="{{ secure_asset('js/app.js') }}" defer></script> 
        
        <!-- Fonts -->
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
        
        <!-- styles -->
        {{-- Laravel標準で用意されているCSSを読み込みます --}}
        <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
        {{-- この章の後半で作成するCSSを読み込みます --}}
        <link href="{{ secure_asset('css/admin.css') }}" rel="stylesheet">
    </head>
    <body>
        <div id="app">
            <nav class="navbar navbar-expand-sm navbar-dark bg-primary mt-3 mb-3">
                <a class="navbar-brand" href="{{ action('Admin\ClosetController@index') }}">mycloset</a>
                <button class="navbar-toggler" type="button" data-toggler="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ action('Admin\ClosetController@index') }}">ホーム</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ action('Admin\ClosetController@add') }}">服登録</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                カテゴリ
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="{{ action('Admin\ClosetController@accessories') }}">アクセサリー</a>
                                <a class="dropdown-item" href="{{ action('Admin\ClosetController@outer') }}">アウター</a>
                                <a class="dropdown-item" href="{{ action('Admin\ClosetController@tops') }}">トップス</a>
                                <a class="dropdown-item" href="{{ action('Admin\ClosetController@bottoms') }}">ボトムス</a>
                                <a class="dropdown-item" href="{{ action('Admin\ClosetController@socks') }}">ソックス</a>
                                <a class="dropdown-item" href="{{ action('Admin\ClosetController@shoes') }}">シューズ</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                             <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink-season" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                季節
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink-season">
                                <a class="dropdown-item" href="{{ action('Admin\ClosetController@spring') }}">春</a>
                                <a class="dropdown-item" href="{{ action('Admin\ClosetController@summer') }}">夏</a>
                                <a class="dropdown-item" href="{{ action('Admin\ClosetController@autumn') }}">秋</a>
                                <a class="dropdown-item" href="{{ action('Admin\ClosetController@winter') }}">冬</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                ログアウト
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                        @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            </nav>
            {{-- ここまでナビゲーションバー　--}}
            
            <main class="py-4">
                {{-- コンテンツをここ入れるため、@yieldで空けておきます --}}
                @yield('content')
            </main>
            <footer>
                <p class="copyright">2020 mycloset</p>
            </footer>
        </div>
    </body>
</html>