<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shwo Teams With Users</title>
</head>

<body>
    <table>
        @foreach ($teams as $team)
            <tr>
                <th colspan="6">
                    <h2>{{ $team->team_name }}</h2>
                    <form action="{{ route('deleteTeam', ['teamId' => $team->id]) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete Team</button>
                    </form>
                <td>
                    <a href="{{ route('AddMemmberToTeam', ['team_id' => $team->id]) }}">Add Emplyee To Team</a>
                </td>
                </th>
            </tr>
            <tr>

                <th>Name</th>
                <th>Role</th>
                <th>Actions 1</th>
                <th>Actions 2</th>
                <th>Actions 3</th>
            </tr>
            @foreach ($team->user as $user)
                <tr>

                    <td>{{ $user->name }}</td>
                    <td>{{  optional($user->role)->role }}</td>
                    <td>
                        <form action="{{ route('updateRole', ['userId' => $user->id]) }}" method="POST">
                            @csrf
                            <select name="role_id">
                                <option value="1">Member</option>
                                <option value="2">Team Leader</option>

                            </select>
                            <button type="submit">Update Role</button>
                        </form>
                    </td>
                    <td>
                        <form action="{{ route('deleteuserFromTeam', ['userId' => $user->id]) }}" method="post">
                            @csrf

                            <button type="submit">Delete</button>
                        </form>
                    </td>
                    <td>

                    </td>
                </tr>
            @endforeach
        @endforeach
    </table>




</body>

</html>