@php
    $routeName = Route::currentRouteName();
@endphp
<nav class="navbar navbar-expand-sm  navbar-dark bg-dark py-0 shadow">
    <a class="navbar-brand ml-5 p-0" href="#">
        <img src="{{asset('img/expin.jpg')}}" height="50"/>
    </a>
    <button class="navbar-toggler"
            type="button"
            data-toggle="collapse"
            data-target="#navbarCollapse"
            aria-controls="navbarCollapse"
            aria-expanded="false"
            aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div id="navbarCollapse" class=" collapse navbar-collapse h-100">
        <ul class="navbar-nav ml-auto">
            @guest
                <li class="nav-item">
                    <a class="nav-link {{($routeName=='login')?'active':''}} " href="{{route('login')}}">
                        Iniciar sesión
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{($routeName=='register')?'active':''}}" href="{{route('register')}}">
                        Registrarse
                    </a>
                </li>
            @endguest
            @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('logout')}}">
                            Cerrar sesión
                        </a>
                    </li>
            @endauth
        </ul>
    </div>
</nav>
