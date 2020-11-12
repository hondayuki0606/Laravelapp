<!DOCTYPE html>
<html>
<head>
<title>Hello/Index</title>
<p>&#064;whiteのディレクティブ例</p>
<ol>
    @php
    $counter = 0;
    @endphp
    @while ($counter < count($data))
    <li>{{$data[$counter]}}</li>
    @php
    $counter++;
    @endphp
    @endwhile
</ol>
</body>
</html>