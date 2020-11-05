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
    public function index()
    {
        $data = [
            'msg'=>'お名前を入力してください。',
                ];
        return view('/hello.index',$data);
    }

    public function post(Request $request){
        $msg = $request->msg;
        $data = [
            'msg'=>'こんにちは' . $msg . 'さん',
        ];
        return view('/hello.index',$data);
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

// Requestの主なメソッド

// $request->$url();
// urlは、アクセスしたurlを返します。ただし、クエリ―文字列（アドレスのあとには
// つけられる?abc=xyzというようなテキストは省略されます。
// $request->$fullUrl();
// fullURLは、アクセスしたアドレスをお完全な形で返します。（クエリ―文字列も含みます。）
// $request->$path();
// pathはドメインしたのパス部分だけを返します。

// requestの主なメソッド
// 続いてResponseです。こちらは、クライアントへ返送する際のステータスコード、表示コンテンツの設定などがあります。
// $this->status();
// アクセスに関するステータスコードを返します。これは正常にアクセスが終了したら200になります。
// $this->content();
// // $this->setContent(値);
// // コンテンツの取得・設定は行うものです。Contentはコンテンツを取得し、SetContentha引数の値にコンテンツを変更します。
// これらのオブジェクトはこれから先、Laravelw使いこなすにつれて利用価値が高まっていくことでしょう。
// まず、ここに挙げたメソッドを使ってオブジェクトの使い方を覚えていきましょう。

// Column サービスとDI
// Laravelでは、アクションメソッドの引数にrequestとresponseを追加するだけで
// それらが利用できるようになりました。
// これはとても不思議な事ですが、サービスとサービスコンテナの機能について知る必要があります。
// アクションメソッドに引数を追加すると、サービスコンテナによって対応するクラスのインスタンスがその引数に渡されて
// 利用できるようになっていたのです。
// この機能は、メソッドインジェクションと呼ばれます。
// サービスコンテナのように必要に応じて自動的に機能を組込み仕組みはLaravel以外にも多用されています。
// これは一般的にDIと呼ばれ関連する機能を自動的に組み込む動きを実現するものです。
// メソッドインジェクションはメソッドの引数に追加するだけで、自動的にサービスが組み込まれるものです。

}