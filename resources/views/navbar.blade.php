<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="https://portafolio-santiagolargo.herokuapp.com" target="_blank">Portafolio personal</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="https://github.com/sonder672" target="_blank">GitHub</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="https://www.linkedin.com/in/santiago-largo-d%C3%ADaz-747a35225/" target="_blank">Linkedin</a>
                </li>
            </ul>
        </div>
        <div class="d-flex align-items-center">
            <form action="{{ route('logout') }}" method="post">
                @csrf
                <button type="submit" class="dropdown-item">Salir</button>
            </form>
        </div>
    </div>
</nav>
