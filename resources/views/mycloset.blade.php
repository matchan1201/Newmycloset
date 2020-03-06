<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
         {{-- 後の章で説明します --}}
        <meta name="csrf-token" content="{{ csrf_token() }}">

        {{-- 各ページごとにtitleタグを入れるために@yieldで空けておきます。 --}}
        <title>mycloset</title>

        <!-- Scripts -->
         {{-- Laravel標準で用意されているJavascriptを読み込みます --}}
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
        <!-- Styles -->
        {{-- Laravel標準で用意されているCSSを読み込みます --}}
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        {{-- この章の後半で作成するCSSを読み込みます --}}
        <link href="{{ asset('css/mycloset.css') }}" rel="stylesheet">
        {{-- ツイッターとブログの図を導入するFont Awesome--}}
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">

    </head>
    <body>
      <nav class="navbar navbar-expand-sm sticky-top navbar-dark bg-primary mt-3 mb-3">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav4" aria-controls="navbarNav4" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        <a class="navbar-brand mx-auto" href="{{ url('') }}">{{ config('app.name') }}</a>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav4">
          <ul class="navbar-nav">
              <li class="nav-item active">
                  <a class= "nav-link" href="{{ url('') }}">ホーム</a>
              </li>
              <li>
                  <a class= "nav-link" href="#closet">MyClosetとは</a>
              </li>
              <li>
                  <a class= "nav-link" href="#introduction">自己紹介</a>
              </li>
              <li>
                  <a class="nav-link" href="#contents">コンテンツ</a>
              </li>
              <li>
                  <a class= "nav-link" href="{{ url('login') }}">ログイン</a>
              </li>
                  <a class= "nav-link" href="{{ url('register') }}">新規会員登録</a>
              </li>
          </ul>
        </div>
      </nav>
          <div class="main">
              <div class="main col-sm-12 mx-auto">
                  <div class="card-contents w-100" style="background-color: #fff;">
                      <h1 id="closet">myclosetとは...</h1>
                      <p>自分のクローゼットの服の数を記録するサービスです</p>
                  </div>
                  <div class="card-contents w-100" style="background-color: #fff;">
                      <h1 id "introduction">まっちゃんとは</h1>
                      <p>
                            Webエンジニアになるために勉強中！<br>
                            資産運用もしています。<br>
                            どうぞよろしくお願いします。<br>
                      </p>
                  </div>
                  <div class="card-contents w-100" style="background-color: #fff;">
                      <h1 id="contents">コンテンツ</h1>
                      <div class="row">
                          <div class="contents-right col-6">
                              <a class="contents-link" href="https://matsugramming.com/" target="_blank" rel="noopener noreferrer"><i class="fas fa-blog fa-5x"></i></a>
                              <h3>blog</h3>
                              <p>ブログやってます</p>
                          </div>
                          <div class="contents-left col-6">
                              <a class="contents-link" href="https://twitter.com/matsumatsu1201" target="_blank" rel="noopener noreferrer"><i class="fab fa-twitter-square fa-5x"></i></a>
                              <h3>twitter</h3>
                              <p>twitterやってます</p>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <footer>
            <div class="row">
              <p class="copyright mx-auto">2020 mycloset</p>
            </div>
          </footer>
    </body>
</html>
