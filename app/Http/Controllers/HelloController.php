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
        $html = $head . tag('title','Hello/Index') . $style .
                $body
                . tag('h1','Index') . tag('p','this is Index page')
                . '<a href="/laravelapp/public/hello/other">go to Other page</a>'
                . $end;
        return $html;
 
    }
// コントローラに記述できたら、続けてルーティングも用意しておきましょう。
// web.phpに用意したHelloController@indexのルートを削除し、以下に新たに追記してください。
}