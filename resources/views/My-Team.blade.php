<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Myteam</title>
</head>

<body>

  <table>
    <tr>
      <th>Team</th>
      <th>Name</th>
      <th>Email</th>
      <th>Company_id</th>
      <th>Type</th>
    </tr>

    @foreach($users as $user)


    <tr>
      <td>{{ optional($user->team)->team_name }}</td>
      <td>{{$user->name}}</td>
      <td>{{$user->email}}</td>
      <td>{{  optional($user->company)->company_name }}</td>
      <td>{{  optional($user->role)->role }}</td>
    </tr>
  @endforeach
  </table>


</body>

</html>