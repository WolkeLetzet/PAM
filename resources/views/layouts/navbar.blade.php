<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
 


    <title>Computadores</title>
</head>
<header>

    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <!--LINK A INICIO--->
            <div>
                <span>
                    <a href="{{ route('index') }}" class="navbar-brand mb-0 h1">INICIO</a>
                </span>
            </div>

        <!--Buscador---->
            <form class="d-flex" >
                <input class="form-control me-2" name='search' type="search" placeholder="Buscar oficina o usuario" aria-label="Buscar">
                <button class="btn btn-outline-dark" type="submit">Buscar</button>
            </form>

             <!-- Settings Dropdown -->
             @auth
             <x-jet-dropdown id="settingsDropdown">
                 <x-slot name="trigger">
                     @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                         <img class="rounded-circle" width="32" height="32" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                     @else
                         {{ Auth::user()->name }}

                         <svg class="ms-2" width="18" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                             <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                         </svg>
                     @endif
                 </x-slot>

                 <x-slot name="content">
                     <!-- Account Management -->
                     <h6 class="dropdown-header small text-muted">
                         {{ __('Manage Account') }}
                     </h6>

                     <x-jet-dropdown-link href="{{ route('profile.show') }}">
                         {{ __('Profile') }}
                     </x-jet-dropdown-link>

                     @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                         <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                             {{ __('API Tokens') }}
                         </x-jet-dropdown-link>
                     @endif

                     <hr class="dropdown-divider">

                     <!-- Authentication -->
                     <x-jet-dropdown-link href="{{ route('logout') }}"
                                          onclick="event.preventDefault();
                                                  document.getElementById('logout-form').submit();">
                         {{ __('Log out') }}
                     </x-jet-dropdown-link>
                     <form method="POST" id="logout-form" action="{{ route('logout') }}">
                         @csrf
                     </form>
                 </x-slot>
             </x-jet-dropdown>
         @endauth


        </div>
    </nav>
</header>

<body>


    <div class="container-fluid">
        @yield('table')

        @yield('create-form')

        @yield('edit-form')

        @yield('show-computer')
        @yield('add-comment')
    </div>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>
    -->
</body>

</html>
