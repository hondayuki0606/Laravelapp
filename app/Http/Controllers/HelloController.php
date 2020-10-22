<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

}