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
                    <div class="navbar-nav-scroll">
                    {{-- ログインしていなかった場合、ログイン画面を表示 --}}
                    @guest
                        <ul class="navbar-nav bd-navbar-nav flex-row mr-auto">
                            <li class="nav-item active"><a class="nav-link" href="{{ route('login') }}">{{ __('messages.Login') }}</a></li>
                            <li class="nav-item active"><a class="nav-link" href="{{ url('/register') }}">{{ __('messages.Register') }}</a></li>
                        </ul>
                    </div>
                    @else
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto">
                            {{-- ログインしていた場合、ユーザー名とログアウトボタンを表示 --}}
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="" id="navbarDropdownNewsLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">ニュース</a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownNewsLink">
                                    <a class="dropdown-item" href="{{ url('admin/news/create') }}">新規作成</a>
                                    <a class="dropdown-item" href="{{ url('admin/news') }}">編集・削除</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="" id="navbarDropdownProfileLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">プロフィール</a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownProfileLink">
                                    <a class="dropdown-item" href="{{ url('admin/profile/create') }}">新規作成</a>
                                    <a class="dropdown-item" href="{{ url('admin/plofile') }}">編集・削除</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                    <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}" ouclink="event.preventDefaut(); document.getElementById('logout-form').submit();">
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