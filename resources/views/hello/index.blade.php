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
@for ($i=1;$i<100;$i++)
@if($i % 2 == 1)
    @continue
@elseif($i <= 10)
<li>No,{{$i}}
@else
    @break
@endif
@endfor
</ol>
</body>
</html>