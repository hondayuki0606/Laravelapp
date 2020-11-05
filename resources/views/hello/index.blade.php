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
<p>{{$msg}}</p>
<form method="POST" action="/hello">
@csrf
<input type="text" name="msg">
<input type="submit">
</form>
</body>
</html>