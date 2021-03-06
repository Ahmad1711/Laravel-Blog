<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/toastr.min.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">
    @yield('styles')
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div class="container">
                <div class="row justify-content-center">
                    @if(Auth::check())
                    <div class="col-md-4">
                        <div class="list-group">
                            <a href="{{route('dashboard')}}" class="list-group-item list-group-item-action">Home</a>
                            <a href="{{route('post.create')}}" class="list-group-item list-group-item-action">Create New Post</a>
                            <a href="{{route('tag.create')}}" class="list-group-item list-group-item-action">Create New Tag</a>
                            <a href="{{route('category.create')}}" class="list-group-item list-group-item-action">Create New Category</a>
                            @if(Auth::user()->admin)
                            <a href="{{route('user.create')}}" class="list-group-item list-group-item-action">Create New User</a>
                            <a href="{{route('user.index')}}" class="list-group-item list-group-item-action">All Users</a>
                            @endif
                            <a href="{{route('user.profile')}}" class="list-group-item list-group-item-action">My Profile</a>
                            <a href="{{route('category.index')}}" class="list-group-item list-group-item-action">All Categories</a>
                            <a href="{{route('post.index')}}" class="list-group-item list-group-item-action">All Posts</a>
                            <a href="{{route('post.trashed')}}" class="list-group-item list-group-item-action">All Trashed Posts</a>
                            <a href="{{route('tag.index')}}" class="list-group-item list-group-item-action">All Tags</a>
                            <a href="{{route('setting.edit')}}" class="list-group-item list-group-item-action">Settings</a>
                        </div>
                    </div>
                    @endif
                    <div class="col-md-8">
                        @yield('content')
                    </div>
                </div>
            </div>
        </main>
    </div>


    @if(Session::has('success'))
    <div class="alert alert-success" role="alert">
        {{Session::get('success')}}
    </div>
    @endif


    @if(Session::has('info'))
    <div class="alert alert-warning" role="alert">
        {{Session::get('info')}}
    </div>
    @endif
    
    @yield('scripts')
</body>

</html>