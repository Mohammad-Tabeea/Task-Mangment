<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/login.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Register</title>
</head>

<body>
    @include('header')
    <section class="login">
        <div class="card-login">
            <p>Register</p>
            <div class="input-login">
                <form class="input-lo" action="registeruser" method="post">
                    @csrf
                    <input type="hidden" value="{{session('company_id')}}" name="company_id">
                    <input type="text" placeholder="Name" name="name" required>
            </div>
            <div class="input-lo">
                <input type="email" placeholder="Email" name="email" required>
            </div>
            <div class="input-lo">
                <input type="password" placeholder="Password" name="password" required>
            </div>
            <div class="button-login">
                <button type="submit">Singup</button>
                </form>
            </div>
        </div>
    </section>
    @include('footer')
</body>

</html>