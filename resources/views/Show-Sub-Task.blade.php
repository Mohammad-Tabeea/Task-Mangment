<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show task</title>
</head>
<body>


    <table>
        <tr>
            <th>title</th>
            <th>description</th>
            <th>start_date</th>
            <th>end_date</th>
            <th>Action</th>
            <th>Action</th>
        </tr>
            <tr>
                <td>{{ $mySubTask->title }}</td>
                <td>{{ $mySubTask->description }}</td>
                <td>{{ $mySubTask->start_date }}</td>
                <td>{{ $mySubTask->end_date }}</td>
                <td> 
                    <a href="{{ route('DetailsSub', ['subtask' => $mySubTask->id]) }}">Details</a>
                </td>
                <td>
                    <form action="{{ route('deleteSubTask', ['subtask' => $mySubTask->id]) }}"  method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
    </table>


</body>
</html>
