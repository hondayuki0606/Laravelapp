<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

global $head, $style, $body, $end;
$head = '<html><head>';

$style = <<<EOF
<style>
body { font-size:16pt; color:#999; }
h1 { font-size:100pt; text-align:right; color:#111;
    margin:-40px 0px -50px 0px; }
</style>
EOF;
$body = '</head><body>';
$end = '</body></html>';

function tag($tag, $txt){
    return "<{$tag}>" . $txt . "</{$tag}>";

}
class HelloController extends Controller
{
    public function index(Request $request, Response $response){
        $html = <<<EOF
<html>
<head>
<title>Hello/Index</title>
<style>
body {font-size:16pt; color:#999;}
h1 {font-size:120pt; text-align:right;
    color:#999; margin:-50px 0px -120px 0px;}
</style>
</head>
<body>
<h1>Hello</h1>
<h3>Request</h3>
<pre>{$request}</pre>
<h3>Response</h3>
<pre>{$response}</pre>
</body>
</html>
EOF;
$response->setContent($html);
return $html;

    }
    public function __invoke()
    {
        global $head, $style, $body, $end;
        $html = $head . tag('title','Hello/Index') . $style .
                $body
                . tag('h1','Index') . tag('p','this is Index page')
                . '<a href="/laravelapp/public/hello/other">go to Other page</a>'
                . $end;
        return $html;
 
    }
    public function other()
    {
        global $head, $style, $body, $end;
        $html = $head . tag('title','Hello/Other') . $style .
                $body
                . tag('h1','Other') . tag('p','this is Other page')
                . '<a href="/laravelapp/public/hello/other">go to Other page</a>'
                . $end;
        return $html;
 
    }
// コントローラに記述できたら、続けてルーティングも用意しておきましょう。
// web.phpに用意したHelloController@indexのルートを削除し、以下に新たに追記してください。

// シングルアクションコントローラーでは__invokeメソッドを実装して使っていますが、
// このメソッドは、Laravelの機能というわけでは、ありません。これは、PHPクラスに用意
// されているマジックメソッドと呼ばれるメソッドの1つです。
// マジックメソッドは、あらかじめ特別や役割を与えられるメソッドで、一般的に半角マイナス2つで始まる名前をしています。
// __invokeは、そのクラスのインスタンスを関数敵に実行するもので、インスタンスに()をつけて関数として呼び出すと
// インスタンス内の__invokeが実行されます。
// したがって、コントローラーに限らず、一般的なクラスでもインスタンスをそのまま関数のように実行させたいという場合に
// 利用されます。

// リクエストとレスポンス
// コントローラーの基本的な使い方は、だいぶ分かってきたことでしょう。最後にクライアントとサーバーの間のやり取りを管理する
// リクエストとレスポンスについて、触れておきましょう。

// ここまで作成してきたアクションメソッドを見ると、引数も特に用意されておらず、
// 非常にあっさりとした構造でしたが、実際のWEBアクセスというには
// 内部で非常に多くの情報をやりとしています。
// 既にPHPを使ってみる皆さんなら、アクセスに関する情報を取得するために、
// ＄‗REQUESTなどのグローバル変数を利用したことがあるがあるでしょう。
// ＄‗REQUESTは、リクエストに関する情報をまとめたものでした。
// クライアントからサーバーへアクセスをしたとき、クライアントから送られてたきた情報は
// リクエストとして扱われます。そしてサーバーからクライアントへ送られてきた情報は
// レスポンスとして扱われます。このりくいぇすととレスポンスをうまく扱うことがWEBサイトへの
// アクセス処理にはとても重要な事です。

// このリクエストとレスポンスの情報はLaravelでもでも利用することができます。
// これはllluminate/Http名前空間に用意されているRequest,Responsというクラスとして
// 用意されています。

// これらのオブジェクトには、レスポンスとまたはリクエストにk名する情報を保管する
// プロパティやそれらを操作するためのメソッドが用意されています。
// 本格的な、利用はもう少しLaravelを使いこなせるようになってから考えるとして、
// とりあえずこれらのオブジェクトがどんなものか、どう使うのかを覚えておきましょう。

}