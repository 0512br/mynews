<!DOCTYPE html>
<!--アプリで設定されているロケールを取得し言語設定する-->
<html lang="{{ app()->getLocale() }}"> 
    <head>
        <meta charset="UTF-8">
        <!--端末によって画面調整できるようにした-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--edgeに対応する、とりあえず書く-->
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <!--新しいやつ、CSRF Token、CSRFから守ってる -->
        <meta name="csrf-token" content="{{ csrf_token()}}">
        <!--titleタグが各ページで違う-->
        <!--{{--各ページごとにtitleタグを入れるために@yieldで空けておく--}}-->
        <title>@yield('title')</title>
        <!--Laravel標準で用意されているJavascriptを読み込む-->
        <!--実行時におけるjsディレクトリの中のapp.jsファイルのアドレス取得-->
        <script src="{{ secure_asset('js/app.js') }}" defer></script>
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link hrel="https://fonts.googleapis.com/css2?family=Rokkitt:wght@300;400;600&display=swap" rel="stylesheet" type="text/css">
        <!--この章の後半で作成するCSSを読み込む-->
        <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ secure_asset('css/admin.css') }}" rel="stylesheet">
    </head>
    
    <body>
        <div id="app">
            <!--画面上部に表示するナビゲーションバー-->
            <nav class="navbar navbar-expand-mdnavbar navbar-laravel">
                <div class="container">
                    <a class="navbar-brand" href="{{url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-toggler-collapse" id="navbarSupportedContent">
                        <!--Left side of Navbar-->
                        <ul class="navbar-nav mr-auto">
                            // 20-12-02 navの作成, routeはweb.phpでnameの記載があるので使えるらしい
                            <li class="nav-item active"><a class="nav-link" href="{{ route('home') }}">HOME</a></li>
                        </ul>
                        <!--Right side of Navbar-->
                        <ul class="navbar-nav ml-auto">
                            {{-- PHP/Laravel 12で追記 --}}
                            <!--Authentication Links-->
                            {{-- ログインしていなかった場合、ログイン画面を表示 --}}
                            @guest
                            <li><a class="nav-link" href="{{ route('login') }}">{{ __('messages.Login') }}</a></li>
                            {{-- ログインしていた場合、ユーザー名とログアウトボタンを表示 --}}
                            @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                    <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}" outlink="event.preventDefauly(); document.getElementById('logout-form').submit();">
                                        {{ __('messages.Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            @endguest
                            {{-- 12追記おわり --}}
                        </ul>
                    </div>
                </div>
            </nav>
            <!--ここまでナビゲーションバー-->
            
            <main class="py-4">
                {{--コンテンツをここに入れるため、@yieldで空ける--}}
                {{--bladeファイルで各@yieldにテキストやコンテンツを埋め込む--}}
                @yield('content')
            </main>
        </div>
    </body>
    
</html>