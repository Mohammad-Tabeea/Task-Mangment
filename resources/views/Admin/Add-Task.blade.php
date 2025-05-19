<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/login.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Add Task</title>
</head>
<body>
    @include('header')
    <section class="login">
        <div class="card-login">
            <p>Add Task</p>
            <div class="input-login">
            <form class="input-lo" action="{{ route('AddTask') }}" method="post">
    @csrf
    <input type="text" placeholder="title" name="title" required>
    <input type="text" placeholder="description" name="description" required>
    <input type="date" placeholder="start date" name="start_date" required>
    <input type="date" placeholder="end date" name="end_date" required>
    <label>اختر الفرق:</label><br>
    @foreach ($teams as $team)
        <input type="checkbox" name="team_ids[]" value="{{ $team->id }}" id="team{{ $team->id }}">
        <label for="team{{ $team->id }}">{{ $team->team_name }}</label><br>
    @endforeach
    <label>اختر قادة الفرق:</label><br>
    @foreach ($teamLeaders as $teamLeader)
        <input type="checkbox" name="team_leader_ids[]" value="{{ $teamLeader->id }}" id="leader{{ $teamLeader->id }}">
        <label for="leader{{ $teamLeader->id }}">{{ $teamLeader->name }}</label><br>
    @endforeach
    <div class="button-login">
        <button type="submit">Add Task</button>
    </div>
</form>



            </div>
        </div>
    </section>
    @include('footer')

</body>

</html>