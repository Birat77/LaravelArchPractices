<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Posts Create Page</title>
</head>
<body>
    <h1>Create Post</h1>
    <div class="container">
        <div class="list">
            <form action="">
                {{-- <select name="channel_id" id="channel_id">
                    @foreach ($channels as $channel)
                        <option>{{$channel->name}}</option>
                    @endforeach
                </select> --}}
                @include('channel.partials.channels-dropdown',['field'=>'post_channel'])
            </form>
        </div>
    </div>
</body>
</html>
