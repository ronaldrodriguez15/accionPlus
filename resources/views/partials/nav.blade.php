<nav class="navbar navbar-expand-lg background-blue navbar-dark">
    <div class="container">
        <a class="navbar-brand" href="{{ route('bienvenido.index') }}">
            <img src="{{ asset('img/logo.png') }}" alt="Logo" width="150">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link pl-3 pr-3 {{ Request::is('bienvenido') ? 'active' : '' }}"
                        href="{{ route('bienvenido.index') }}">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link pl-3 pr-3 {{ Request::is('usuarios') ? 'active' : '' }}"
                        href="{{ route('usuarios.index') }}">Usuarios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link pl-3 pr-3 {{ Request::is('favoritos') ? 'active' : '' }}"
                        href="{{ route('favoritos.index') }}">Sitios Favoritos</a>
                </li>
                <li class="nav-item dropdown pl-3 pr-3">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    
                        <b>{{ Auth::user()->name }}</b>

                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
