<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8" />
</head>
<body>
<h2>제목 : {{$subject}}</h2>
<p>이름 : {{ $name }}</p>
<p>핸드폰번호 : {{ $phone }}</p>
<p>내용 : {{ $message }}</p>
<div style="width:100%">
    <img src="{{$path}}">
</div>
</body>
</html>
