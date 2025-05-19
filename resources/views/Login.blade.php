<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/login.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Login</title>
</head>

<body>
    @include('header')
    <section class="login">
        <div class="card-login">
            <p>Login</p>
            <div class="input-login">
                <form class="input-lo" action="login" method="post">
                    @csrf
                    <input type="email" placeholder="Email" name="email">
            </div>
            <div class="input-lo">

                <input type="password" placeholder="Password" name="password">
            </div>
            <div class="button-login">
                <button type="submit">Login</button>
                <span>Dont have account<a href="{{route('viewregister')}}">Signup</a></span>
            </div>
            <div class="final-login">
                <p>OR</p>
                <button class="facebook"> Register by facebook</button>
                <button class="google">Register by google</button>
            </div>

            </form>

        </div>
        </div>

    </section>
    @include('footer') 
</body>

</html>