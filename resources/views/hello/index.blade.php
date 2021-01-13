<!DOCTYPE html>
<html>
<head>
</head>
<body>
    <!-- ＠extendsについて
    まず最初に用意すべきは、レイアウトの継承設定です。
    これは下記のように記述できます -->
    @extends('layouts.helloapp')
    <!-- これで「layout」フォルダ内の「helloapp.blade.php」という
    レイアウトファイルをロードし、親レイアウトとして継承します。
    これがないとレイアウトの継承そのものが機能しなくなりますので
    注意してください。 -->
    <!-- ＠sectionの書き方
    続いて、＠sectionの表示内容の書き方です。これには2通りあります
    1つはタイトルの表示に使った書き方です -->
    @section('titile','Index')
    <!-- 単純にテキストや数字などをセクションに表示させるだけなら
    ＠sectionの引数内に、当てはめるセクション名とそこに表示する値
    をそれぞれ引数に用意します。
    今回はtitleという名前のセクションにIndexというテキスト値を
    設定します。もう1つは書き方は＠endsectionを併用した書き方です。 -->
    @section('menubar')
    @parent
    インデックスページ
    @endsection

    @section('content')
    <p>ここが本文のコンテンツ</p>
    <p>必要なだけ記述できます。</p>
    @endsection

    @coomponent('components.message')
        @slot('msg_title')
        CAUTION!
        @endslot

        @slot('msg_content')
        これはメッセージの表示です。
        @endslot
    @endcomponent

    @section('footer')
    copyright 2020 tuyano.
    @endsection
</body>
</html>