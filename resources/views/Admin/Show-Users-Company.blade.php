<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Emplyee </title>
</head>
<body>
    
<table>
  <tr>
    <th>Id</th>
    <th>Name</th>
    <th>Email</th>
    <th>Company_id</th>
    <th>Role</th>
    <th>Actions</th>
    <th>Actions</th>
  </tr>
  
  @foreach($users as $user)
  <tr>
    <td>{{$user->id}}</td>
    <td>{{$user->name}}</td>
    <td>{{$user->email}}</td>
    <td>{{  optional($user->company)->company_name }}</td>
    <td>{{$user->role_id}}</td>
    <td>
        <form action="{{ route('updateRole', ['userId' => $user->id]) }}" method="POST">
            @csrf
            <select name="role_id">
                <option value="1">Member</option>
                <option value="2">Team Leader</option>
            </select>
            <button type="submit"> update role</button>
        </form>
    </td>
    <td>
    <td>
                <form action="{{ route('deleteUser', ['userId' => $user->id]) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </td>
    </td>
  </tr>
@endforeach
</table>

   
</body>
</html>