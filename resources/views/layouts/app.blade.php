<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


    @yield('css')
    
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
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle"  style="margin-left:1000px" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                              <a class="dropdown-item" href="{{ route('logout') }}"  onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                 {{ __('Logout') }}</a>
                 <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                    </form>
                            
                            </div>
                          </div>
                           
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
    @auth
    
    <div class="container">


        <div class="row">
            <div class="col-md-3 py-3">
                <ul class="list-group">
                    <div class="alert alert-dark" role="alert">
                        All of items
                      </div>
                      @if (auth()->user()->isAdmin())
                      <li class="list-group-item">
                        <a href="{{route('users.index')}}">Users</a>
    
                    </li>
                          
                      @endif
                    <li class="list-group-item">
                        <a href="{{route('posts.index')}}">Post</a>
    
                    </li>


                    <li class="list-group-item">
                        <a href="{{route('categories.index')}}">Category</a>
    
                    </li>

                    <li class="list-group-item">
                        <a href="{{route('trashed.index')}}">Trashed Posts</a>
    
                    </li>


                    <li class="list-group-item">
                        <a href="{{route('tags.index')}}">Tag</a>
    
                    </li>

                    
                    <li class="list-group-item">
                        <a href=" {{route('users.edit', auth()->user()->id)}}">Profile</a>
    
                    </li>
    
                </ul>
            </div>

            <div class="col-md-8">

                <main class="py-3">
                    @yield('content')
                </main>
            </div>
    
        </div>
    
       </div>
    

  
</div>


    @else
    
    <main class="py-4">
        @yield('content')
    </main>
    @endauth



    @yield('scripts')
  
</body>
</html>


