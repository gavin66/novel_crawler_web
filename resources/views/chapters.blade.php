<!doctype html>
<html lang="UTF-8">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>列表</title>
    <link href="/css/novel.css" rel="stylesheet">
</head>
<body>
<div class="flex-center position-ref full-height">
    <div class="content">
        <ul>
            @foreach($chapters as $chapter)
                <li><a href='/chapter?url={{urlencode($chapter['link'])}}'>{{$chapter['name']}}</a></li>
            @endforeach
        </ul>
    </div>
</div>
</body>
</html>
