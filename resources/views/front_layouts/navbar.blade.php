<nav class="navbar navbar-expand-lg navbar-light bg-light mt-3">
    <a class="navbar-brand" href="{{route("index")}}">Home</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{route("continents.index")}}">Continents</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route("countries.index")}}">Countries</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route("cities.index")}}">Cities</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route("panel.login")}}">Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route("panel.register")}}">Register</a>
            </li>
        </ul>
    </div>
</nav>
