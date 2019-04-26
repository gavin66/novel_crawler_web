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
        @foreach($chapter as $row)
            {{$row}}<br>
        @endforeach
    </div>
</div>
</body>
</html>
