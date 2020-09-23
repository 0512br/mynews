<!--レイアウトを作成している。すべてのページの共通部分を設定。-->
<!DOCTYPE html>
<!--アプリで設定されているロケールを取得し言語設定する-->
<html lang="{{ app()->getLocale() }}"> 
    <head>
        <meta charset="UTF-8">
        <!--端末によって画面調整-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--edgeに対応する、とりあえず書く-->
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <!--新しいやつ、CSRF Token -->
        {{-- 後の章で説明 --}}
        <meta name="csrf-token" content="{{ csrf_token()}}">
        <!--titleタグが各ページで違う-->
        {{-- 各ページごとにtitleタグを入れるために@yieldで空けておく --}}
        <title>@yield('title')</title>
        {{-- Laravel標準で用意されているJavascriptを読み込む --}}
        <!--実行時におけるjsディレクトリの中のapp.jsファイルのアドレス取得-->
        <script src="{{ secure_asset('js/app.js') }}" defer></script>
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link hrel="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
        {{-- この章の後半で作成するCSSを読み込む --}}
        <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ secure_asset('css/admin.css') }}" rel="stylesheet">
    </head>
    
    <body>
        <div id="app">
            {{-- 画面上部に表示するナビゲーションバー --}}
            <nav class="navbar navbar-expand-mdnavbar-dark navbar-laravel">
                <div class="container">
                    <a class="navbar-brand" href="{{url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                    <button class="navbar-toggler" type="button" date-toggle="collapse" date-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-toggler-collapse" id="navbarSupportedContent">
                        <!--Left side of Navbar-->
                        <ul class="navbar-nav mr-auto"></ul>
                        <!--Right side of Navbar-->
                        <ul class="navbar-nav ml-auto"></ul>
                    </div>
                </div>
            </nav>
            {{-- ここまでナビゲーションバー --}}
            
            <main class="py-4">
                {{-- コンテンツをここに入れるため、@yieldで空ける --}}
                @yield('content')
            </main>
        </div>
    </body>
    
</html>