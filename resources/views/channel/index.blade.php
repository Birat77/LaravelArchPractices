<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Channels List Page</title>
</head>
<body>
    <div class="container">
        <h1>Channels List</h1>
        <div class="list">
            <ol>
            @foreach ($channels as $channel)
            <li>{{$channel->name}}</li>
            @endforeach
            </ol>
        </div>
    </div>
</body>
</html>
