<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}"> 
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token()}}">
        <title>@yield('title')</title>
        <script src="{{ secure_asset('js/app.js') }}" defer></script>
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link hrel="https://fonts.googleapis.com/css2?family=Rokkitt:wght@300;400;600&display=swap" rel="stylesheet" type="text/css">
        <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ secure_asset('css/front.css') }}" rel="stylesheet">
    </head>
    
    <body>
        <div id="app">
            <nav class="navbar navbar-expand-mdnavbar navbar-laravel">
                <div class="container">
                    <a class="navbar-brand" href="{{url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                    <!--<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">-->
                    <!--    <span class="navbar-toggler-icon"></span>-->
                    <!--</button>-->
                    @guest
                    <div class="navbar-nav-scroll">
                    {{-- ログインしていなかった場合、ログイン画面を表示 --}}
                        <ul class="navbar-nav bd-navbar-nav flex-row mr-auto">
                            <li class="nav-item active"><a class="nav-link" href="{{ route('login') }}">{{ __('messages.Login') }}</a></li>
                            <li class="nav-item active"><a class="nav-link" href="{{ url('/register') }}">{{ __('messages.Register') }}</a></li>
                        </ul>
                    </div>
                    @else
                    {{-- ログインしていた場合、ユーザー名とログアウトボタンを表示 --}}
                    <!--ネットからコピペ-->
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
                        メニュー <span class="caret"></span>
                    </button>
                      <div class="collapse navbar-collapse" id="navbar">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item">
                                <a class="nav-item nav-link" href="{{ url('admin/news/create') }}">ニュースの新規作成</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-item nav-link" href="{{ url('admin/news') }}">ニュースの編集</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-item nav-link" href="{{ url('admin/profile/create') }}">プロフィールの新規作成</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-item nav-link"  href="{{ url('admin/plofile') }}">プロフィールの編集</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-item nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                    {{ __('messages.Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </div>
                      </div>
                     <!--ここまでコピペ -->
                    @endguest
                    {{-- 12追記おわり --}}
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