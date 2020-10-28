<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Viewメソッドでテンプレートを表示する
// Route::get('hello', function () {
//     return view('hello.index');
// });

// コントローラーでテンプレートを使う
Route::get('hello', 'App\Http\Controllers\HelloController@index');
// response,requestの呼び出し
//Route::get('hello','App\Http\Controllers\HelloController@index');

//Route::get('hello','App\Http\Controllers\HelloController');
// 同じアクションを呼び出す処理を記述するとエラーになる。
Route::get('hello/other','App\Http\Controllers\HelloController@other');
//Route::get('hello','HelloController@index');
Route::get('hello4/{id?}/{pass?}','App\Http\Controllers\HelloController@index');

Route::get('hello2/{id}/{pass}',function($id,$pass){
    $html = <<<EOF
<html>
<head>
<title>Hello</title>
<style>
body {font-size:16pt;
      color:#999;
}
h1 {font-size:100pt;
    text-align:right;
    color:#888;
    margin:-40px 0px -50px 0px;
}
</style>
</head>
<body>
    <h1>Hello</h1>
    <p>{$id} is id page.</p>
    <p>{$pass} is pass page.</p>
    <p>これはサンプルで作ったページです。</p>
</body>
</html>
EOF;
    return $html;
});


Route::get('hello3/{msg?}',function($msg='no message.'){
    $html = <<<EOF
<html>
<head>
<title>Hello</title>
<style>
body {font-size:16pt;
      color:#999;
}
h1 {font-size:100pt;
    text-align:right;
    color:#888;
    margin:-40px 0px -50px 0px;
}
</style>
</head>
<body>
    <h1>Hello</h1>
    <p>{$msg} is msg page.</p>
    <p>これはサンプルで作ったページです。</p>
</body>
</html>
EOF;
    return $html;
});