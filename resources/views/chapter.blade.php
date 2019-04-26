<!doctype html>
<html lang="UTF-8">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>详情</title>
    <link href="/css/novel.css" rel="stylesheet">
</head>
<body>
<div class="flex-center position-ref full-height">
    <div class="content">
        @foreach($chapter['content'] as $row)
            {{$row}}<br>
        @endforeach
    </div>

    <a href='/chapter?url={{urlencode($chapter['previous'])}}'>上一章</a>
    <a href='/chapters?url={{urlencode($chapter['chapters'])}}'>目录</a>
    <a href='/chapter?url={{urlencode($chapter['next'])}}'>下一章</a>
</div>
</body>
</html>
