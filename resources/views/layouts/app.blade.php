<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('WEBWOOF')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="public/style.css">
    @vite('public/style.css')
</head>

<body class="bg-secondary text-black bg-opacity-10 h-100 pb-3 mb-3">
    <header>
        @yield('navbar')
        <nav class="navbar text-white bg-danger sticky-top p-2">
            <span><img class="logonav" src="images/WEBWOOF.jpg" /></span>
            @if (Route::has('login'))
            @auth
            <h3 class="d-flex justify-content-left">Woof, {{Auth::user()->username}}!</h3>
            <span>
                <a href="{{route ('user.edit')}}"><button type=" button"
                        class="btn btn-outline-light">Profile</button></a>
                <a href="{{route ('posts.create')}}"><button type="button" class="btn btn-outline-light">Create
                        Post</button></a>
                <a href="{{route ('deconnexion')}}"><button type="button" class="btn btn-outline-light">Log
                        Out</button></a>
                @else
                <span>Welcome to WEBWOOF
                    <a href="{{route ('login')}}"><button type="button" class="btn btn-outline-light">Log
                            In</button></a>
                    <a href="{{route ('register')}}"><button type="button"
                            class="btn btn-outline-light">Register</button></a>
                </span>
            </span>
            @endauth
        </nav>
        @endif
        <div class="p-3">
            <h1>@yield('title', 'LATEST POSTS')</h1>
        </div>
    </header>
    <main class="p-3">
        @yield('content')
    </main>

    <footer
        class="footer fixed-bottom bg-danger text-white fw-light fs-6 d-flex justify-content-center text-align-center mt-2 pt-3">
        @yield('footer')
        <p class="text-center">
            WEBWOOF 2023 @ LeBocalAcademy © Diogo, Gérald, Jimmy, Héloïse
        </p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
</body>

</html>