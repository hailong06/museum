<nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="{{ url('/welcome') }}">Bảo Tàng Mỹ Thuật Việt Nam</a>
        <img id="museum" src="https://img.icons8.com/windows/32/000000/museum.png"/>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
            aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ms-auto py-4 py-lg-0">
                <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="{{ url('/welcome') }}">Home</a></li>
                <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="{{ url('/blog') }}">Blogs</a></li>
                <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="{{ url('/visit') }}">Visit</a></li>
                <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="">Contact</a></li>
                <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="">About Us</a></li>
                <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="">Booking</a></li>
                <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="">Search
                    <img id="search" src="https://img.icons8.com/ios-filled/50/000000/search--v1.png"/></a>
                </li>

            </ul>
        </div>
    </div>
</nav>
