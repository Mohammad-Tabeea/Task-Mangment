<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Details Task</title>
</head>

<body>
    <table>

        <tr>
            <th>title</th>
            <th>description</th>
            <th>start_date </th>
            <th>end_date </th>
            <th>name </th>

        </tr>

        <tr>
            <td>{{ $task->title }}</td>
            <td>{{ $task->description }}</td>
            <td>{{ $task->start_date }}</td>
            <td>{{ $task->end_date }}</td>
            <td>{{optional($task->team_leader)->name }}</td>


    </table>



</body>

</html>