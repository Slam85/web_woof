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

<body class="bg-secondary text-black bg-opacity-10">
    <header>
        <nav class="navbar text-white bg-danger sticky-top p-2">
            @yield('navbar')
            <!-- Navbar content -->
            <span><img class="logonav" src="public/images/WEBWOOF.png" /></span>
            <h3 class="d-flex justify-content-left">Woof, 'user'!</h3>
            <span>
                <button type=" button" class="btn btn-outline-light">Profile</button>
                <button type="button" class="btn btn-outline-light">Create Post</button>
                <button type="button" class="btn btn-outline-light">Log In</button>
                <button type="button" class="btn btn-outline-light">Log Out</button>
            </span>

        </nav>
        <nav>

            {{-- sticky, logo “<span>woof,  {{$username}}
            </span>”, profile, bouton vers /createpost login/logout--}}
        </nav>
        <h1>@yield('title', 'LATEST POSTS')</h1>
    </header>

    <main>
        @yield('content')
    </main>

    <footer class="navbar fixed-bottom bg-danger text-white fw-light fs-6 d-flex justify-content-center">
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