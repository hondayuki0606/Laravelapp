<!DOCTYPE html>
<html>
<head>
<title>Hello/Index</title>
<style>
body{ font-size:16px; }
h1{ font-size:100px; }
</style>
</head>
<body>
<h1>Index/blade</h1>
@if ($msg != '')
<p>あなたの名前は、{{$msg}}さんですね。</p>
@else
<p>何か入れてください</p>
@endif
<form method="POST" action="/hello">
    @csrf
    <input type="text" name="msg">
    <input type="submit">
</form>
</body>
</html>