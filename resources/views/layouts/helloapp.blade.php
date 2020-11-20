<html>
<head>
    <title>@yield('title')</title>
    <style>
        body {font-size:16pt; color:#999; margin:5px }
        h1 {font-size:50pt;}
    </style>
</head>
<body>
    <!--タイトル部分にはtitleという名前で@yieldを用意してあります。
        ここにtitleのコンテンツを設定します。また<body>内の<h1>にも
        @yieldを用意し、タイトルを表示するようにしてあります。-->
    <h1>@yield('title')</h1>
    @section('menubar')
    <h2 class="menutitle">※メニュー</h2>
    <ul>
        <li>@show</li>
    </ul>
    <hr size="1">
    <div class = "content">
    @yield('content')
    </div>
    <div class = "fotter">
    @yield('fotter')
    </div>
</body>
</html>