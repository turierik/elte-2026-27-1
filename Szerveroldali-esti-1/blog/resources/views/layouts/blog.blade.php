<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog - @yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="container mx-auto">
        <div class="grid grid-cols-4">
            <div class="col-span-4 py-8 text-4xl text-green-500">
                Blogocska
            </div>
            <div class="col-span-3">
                @yield('content')
            </div>
            <div class="col-span-1">
                @guest
                <a href="{{ route('login') }}">Bejelentkezés</a><br>
                <a href="{{ route('register') }}">Regisztráció</a>
                @endguest

                @auth
                    Szia, {{ Auth::user() -> name }}!
                    <form action="{{ route('logout')}}" method="post">
                        @csrf
                        <a href="#" onclick="event.preventDefault(); this.closest('form').submit();">Kijelentkezés</a>
                    </form>
                @endauth
            </div>
        </div>
    </div>
</body>
</html>
