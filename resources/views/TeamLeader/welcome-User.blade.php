<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Welcome Team Leader </title>
</head>
<body>
    <a href="{{route('ShowAddSubTask')}}">Add Sub Task</a>
    <br>
    <a href="{{route('showMytask')}}">Show Task</a>

    <p>يجب اضافة هنا رؤية كل التاسكات الفرعية ضمن فريق هذا الشخص </p>
    <br>
    <a href="{{route('myteam')}}">My Team</a>

    @foreach ($notifications as $notification)
    <div class="notification">
        <p>{{ $notification->data['message'] }}</p>
        @if(isset($notification->data['task_id']))
                <a href="{{ url('/detalstak/' . $notification->data['task_id']) }}">عرض المهمة</a>
            @endif
    </div>
@endforeach

</body>
</html>