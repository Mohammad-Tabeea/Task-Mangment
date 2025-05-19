<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <table>
  <tr>
    <th>Id</th>
    <th>Team Nmae</th>
    <th>Company_id</th>
    <th>Action</th>
  </tr>
  @foreach($teams as $team)
  <tr>
    <td>{{$team->id}}</td>
    <td>{{$team->team_name}}</td>
    <td>{{$team->company_id}} </td>
    <td><a href="{{ route('getnullteam', ['teamId' => $team->id]) }}">edit team</a></td>
    
  </tr>
 @endforeach
</table>
   
</body>
</html>