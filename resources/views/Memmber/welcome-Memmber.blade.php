<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Welcome Memmber</title>
</head>

<body>
    
    <a href="{{route('showsubtask')}}">show sub task</a>
    <br>
    <a href="{{route('myteam')}}">My team</a>

    @foreach ($notifications as $notification)

        <div class="notification">
            <p>{{ $notification->data['message'] }}</p>
            @if(isset($notification->data['subTask_id']))
                <a href="{{ url('/detailsSub/' . $notification->data['subTask_id']) }}">عرض المهمة</a>
            @endif
        </div>
    @endforeach
</body>

</html>