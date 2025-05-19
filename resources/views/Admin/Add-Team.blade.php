<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/login.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Add Team</title>
</head>
<body>
    @include('header')
    <section class="login">
        <div class="card-login">
            <p>Add Team</p>
            <div class="input-login">
                <form class="input-lo" action="{{route('AddTeam')  }}" method="post">
                    @csrf
                    <input type="hidden" value="{{ session('company_id') }}" name="company_id">
                    <input type="text" placeholder="Team Name" name="team_name" required>
                    @foreach ($users as $user)
                        <input type="checkbox" name="user_ids[]" value="{{ $user->id }}" id="user{{ $user->id }}">
                        <label for="user{{ $user->id }}">{{ $user->name }}</label><br>
                    @endforeach
                    <div class="button-login">
                        <button type="submit">Add Team</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    @include('footer')
</body>

</html>