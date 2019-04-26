<!doctype html>
<html lang="UTF-8">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>搜索</title>
    <link href="/css/novel.css" rel="stylesheet">
</head>
<body>
<div class="flex-center position-ref full-height">
    <div class="content">
        <ul>
            @foreach($search as $item)
                <li><a href='/chapters?url={{urlencode($item['link'])}}'>{{$item['name']}}</a></li>
            @endforeach
        </ul>
    </div>
</div>
</body>
</html>
