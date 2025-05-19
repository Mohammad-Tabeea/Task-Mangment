<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show task</title>
</head>
<body>

@foreach($teams as $team)
    <h2>{{ $team->team_name }}</h2>
    <table>
        <tr>
            <th>title</th>
            <th>description</th>
            <th>start_date</th>
            <th>end_date</th>
            <th>Action</th>
            <th>Action</th>
        </tr>
        @foreach ($team->task as $task)
            <tr>
                <td>{{ $task->title }}</td>
                <td>{{ $task->description }}</td>
                <td>{{ $task->start_date }}</td>
                <td>{{ $task->end_date }}</td>
                <td> 
                    <a href="{{ route('detalstak', ['taskId' => $task->id]) }}">Details</a>
                </td>
                <td>
                    <form action="{{ route('deleteTask', ['taskId' => $task->id]) }}"  method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endforeach

</body>
</html>
