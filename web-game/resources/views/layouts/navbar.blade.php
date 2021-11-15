<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container-fluid">
        <a class="nav-brand" href="#">
            <img src="assets/img/logo.png" width="32px" alt="logo"/>
            <span class="ms-3 text-white">ITB Game Store</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menuNavbar"  aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="menuNavbar">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Home</a>
                </li>
                @if(Auth::check())
                <li class="nav-item">
                    <a class="nav-link" href="{{url("logout")}}">Logout</a>
                </li>
                @else
                <li class="nav-item">
                    <a class="nav-link" href="{{url("login")}}" href="#">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Register</a>
                </li>
                @endif

            </ul>
        </div>
    </div>
</nav>
