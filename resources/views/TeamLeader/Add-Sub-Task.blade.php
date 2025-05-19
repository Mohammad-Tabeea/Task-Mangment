<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/login.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Add Sub Task</title>
</head>
<body>
    @include('header')
    <section class="login">
        <div class="card-login">
            <p>Add Sub Task</p>
            <div class="input-login">
                <form class="input-lo" action="AddSubTask" method="post">
                    @csrf
                    <input type="text" placeholder="title" name="title" required>
                    <input type="text" placeholder="description" name="description" required>
                    <input type="date" placeholder="start date" name="start_date" required lang="en">
                    <input type="date" placeholder="end date" name="end_date" required lang="en">
                    @foreach ($tasks as $task)
                        <input type="checkbox" name="task_ids[]" value="{{ $task->id }}" id="{{ $task->id }}">
                        <label for="{{ $task->id }}">{{ $task->title }}</label><br>
                    @endforeach
                    @foreach ($memmbers as $memmber)
                        <input type="checkbox" name="memmber_ids[]" value="{{ $memmber->id }}" id="{{ $memmber->id }}">
                        <label for="{{ $memmber->id }}">{{ $memmber->name }}</label><br>
                    @endforeach
                    <div class="button-login">
                        <button type="submit">Add Sub Task</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    @include('footer')
</body>
</html>