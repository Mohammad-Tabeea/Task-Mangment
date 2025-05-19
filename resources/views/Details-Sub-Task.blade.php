<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Details Sub Task</title>
</head>
<body>
    <table>
        <tr>
            <th>title</th>
            <th>description</th>
            <th>start_date </th>
            <th>end_date </th>
        </tr>
        <tr>
            <td>{{ $SubTask->title }}</td>
            <td>{{ $SubTask->description }}</td>
            <td>{{ $SubTask->start_date }}</td>
            <td>{{ $SubTask->end_date }}</td>
        </tr>
    </table>
</body>

</html>