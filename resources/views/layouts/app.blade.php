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

<body class="bg-secondary text-black bg-opacity-10 h-100 mb-3 pb-3">

    <header>
        @yield('navbar')


        <nav class="navbar navbar-expand-lg  fixed-top text-white bg-danger sticky-top p-2">
            <div class="container-fluid">
                <div class="row d-flex">
                    <div class="col-auto">
                        <a href="{{('/')}}">
                            <img class="logonav" src="/images/WEBWOOF.jpg" />
                        </a>
                    </div>
                    @if (Route::has('login'))
                    @auth

                    <div class="col-auto">
                        <img class="logonav m-1" style="border-radius:10px;"
                            src="{{ asset('storage/images/')}}/{{Auth::user()->uuid}}.jpg " />
                    </div>
                    <div class="col-auto d-flex align-items-center">
                        <h3> Woof, {{Auth::user()->username}}!</h3>
                    </div>

                    @else
                    <div class="col-auto">

                    </div>
                    <div class="col-auto d-flex align-items-center">
                        <h3> Woof Welcome!</h3>
                    </div>

                    @endauth
                    @endif
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
                    aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarScroll">
                    <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 500px;">
                    </ul>
                    <li class="nav-item d-flex bg-danger ">
                        @if (Route::has('login'))
                        @auth
                        <a href="{{route ('posts.create')}}"><button type="button"
                                class="btn btn-outline-light m-2">Create Post</button></a>
                        <a href="{{route ('index')}}"><button type=" button" class="btn btn-outline-light  m-2">My
                                Posts</button></a>
                        <a href="{{route ('user.edit')}}"><button type=" button"
                                class="btn btn-outline-light  m-2">Profile</button></a>
                        <a href="{{route ('deconnexion')}}"><button type="button"
                                class="btn btn-outline-light  m-2">LogOut</button></a>
                        @else
                        <a href="{{route ('login')}}"><button type="button"
                                class="btn btn-outline-light m-2">LogIn</button></a>
                        <a href="{{route ('register')}}"><button type="button"
                                class="btn btn-outline-light m-2">Register</button></a>
                        @endauth
                        @endif
                    </li>
                </div>
            </div>
        </nav>

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