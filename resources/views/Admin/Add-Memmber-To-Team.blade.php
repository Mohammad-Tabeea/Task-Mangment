<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Memmber to Team</title>
</head>

<body>
    <!-- @if(isset($message))
    <p style="color: red; font-weight: bold;">{{ $message }}</p>
@endif -->

    <table>
        <tr>
            <th class="">Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Actions</th>
        </tr>

        @forelse($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ optional($user->role)->role }}</td>
                <td>
                    <form action="{{ route('MemmberTeam', ['team_id' => $team_id]) }}" method="post">
                        @csrf
                        <input type="hidden" name="userId" value="{{ $user->id }}">
                        <button type="submit">Add</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4" style="text-align: center; color: red; font-weight: bold;">
                    لا يوجد مستخدمون متاحون حاليًا.
                </td>
            </tr>
        @endforelse
    </table>

</body>

</html>