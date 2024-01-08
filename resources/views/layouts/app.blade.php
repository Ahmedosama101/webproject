<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
<style>
    table, td, th {
  border: 1px solid black;
}
th, td {
  padding: 10px;
}
    table {
        text-align: center;
    }
</style>
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                    @if(auth()->check())
                        @if(auth()->user()->role == 1) <!-- Superadmin -->
                        <div class="dropdown show-on-hover">
                         <a class="btn dropdown-toggle" href="" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">Projects</a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <li><a class="dropdown-item" href="{{ route('project.index') }}">View Project</a></li>
                                <li><a class="dropdown-item" href="{{ route('project.create') }}"> Add Project</a></li>
                                <li><a class="dropdown-item" href="{{ route('project.toedit') }}"> Edit Project</a> </li>
                                <li> <a class="dropdown-item" href="{{ route('project.delete') }}">Delete Project</a> </li>
                            </ul>
                        </div>
                        <div class="dropdown ms-4">
                         <a class="btn dropdown-toggle" href="" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">Users</a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <li><a class="dropdown-item" href="{{ route('user.index') }}">View Users</a></li>
                                <li><a class="dropdown-item" href="{{ route('user.create') }}"> Add Users</a></li>
                                <li><a class="dropdown-item" href="{{ route('user.makeedit') }}"> Edit Users</a> </li>
                                <li> <a class="dropdown-item" href="{{ route('user.delete') }}">Delete Users</a> </li>
                            </ul>
                        </div>
                        @elseif(auth()->user()->role == 2) <!-- Manager -->
                        <div class="dropdown show-on-hover">
                         <a class="btn dropdown-toggle" href="" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">Projects</a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <li><a class="dropdown-item" href="{{ route('project.index') }}">View Project</a></li>
                                <li><a class="dropdown-item" href="{{ route('project.create') }}"> Add Project</a></li>
                                <li><a class="dropdown-item" href="{{ route('project.toedit') }}"> Edit Project</a> </li>
                                <li><a class="dropdown-item" href="{{ route('project.updatestatus') }}"> Update Project Status</a> </li>
                                <li><a class="dropdown-item" href="{{ route('project.topdf') }}"> Projects Reports</a></li>
                                <li><a class="dropdown-item" href="{{ route('project.delete') }}">Delete Project</a></li>
                            </ul>
                        </div>
                        <div class="dropdown ms-4">
                         <a class="btn dropdown-toggle" href="" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">Users</a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <li><a class="dropdown-item" href="{{ route('user.index') }}">View Users</a></li>
                                <li><a class="dropdown-item" href="{{ route('user.create') }}"> Add Users</a></li>
                                <li><a class="dropdown-item" href="{{ route('user.makeedit') }}"> Edit Users</a> </li>
                                <li> <a class="dropdown-item" href="{{ route('user.delete') }}">Delete Users</a> </li>
                            </ul>
                        </div>
                        @elseif(auth()->user()->role == 3) <!-- Lead Developer -->
                            <li class="nav-item active">
                                <a class="nav-link" href="{{ route('project.index') }}"> View Project</a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link" href="{{ route('project.index') }}"> Edit Project</a>
                            </li>                        
                        @elseif(auth()->user()->role == 4) <!-- Developer -->
                        <li class="nav-item active">
                                <a class="nav-link" href="{{ route('project.index') }}">View Project</a>
                            </li>

                        @elseif(auth()->user()->role == 5) <!-- Owner -->
                        <li class="nav-item active">
                                <a class="nav-link" href="{{ route('project.index') }}"> View Project</a>
                        </li>
                        @endif
                    @endif
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>
                                    
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="container py-5">
            @yield('body')
        </main>
    </div>
</body>
</html>
