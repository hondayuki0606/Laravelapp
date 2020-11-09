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
<p>&#064;foreachディレクティブの例</p>
<ol>
@foreach($data as $item)
<li>{{$item}}
@endforeach
</ol>
</body>
</html>