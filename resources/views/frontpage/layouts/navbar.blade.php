<!-- Navbar -->
<nav class="navbar navbar-expand-lg" style="background-color: #8b5cf6;">
    <div class="container">
        <a class="navbar-brand font-logo text-white d-flex align-items-center fw-bold" href="#"><img
                src="{{ asset('frontpage/assets/icons/icon_web_wefgis.png') }}" alt="" style="width: 30px;">WEF
            GIS</a>

        <div class="dflex">

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item mx-3">
                        <a class="nav-link text-white font-menu-navbar" href="https://wefgis.com/#welcome">Welcome</a>
                    </li>
                    <li class="nav-item mx-3">
                        <a class="nav-link text-white font-menu-navbar"
                            href="https://wefgis.com/#solution">Background</a>
                    </li>
                    <li class="nav-item mx-3">
                        <a class="nav-link text-white font-menu-navbar" href="https://wefgis.com/#features">Data
                            Space</a>
                    </li>
                    <li class="nav-item mx-3">
                        <a class="nav-link text-white font-menu-navbar" href="https://wefgis.com/#user_guide">User
                            Guide</a>
                    </li>
                    <li class="nav-item mx-3">
                        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                            <li class="nav-item dropdown">
                                @if (Route::has('login'))
                                    @auth
                                        <a class="nav-link dropdown-toggle text-white" id="navbarDropdown" href="#"
                                            role="button" data-bs-toggle="dropdown"
                                            aria-expanded="false">{{ Auth::user()->name }}</a>
                                    @else
                                        <a class="nav-link dropdown-toggle text-white" id="navbarDropdown" href="#"
                                            role="button" data-bs-toggle="dropdown" aria-expanded="false"><i
                                                class="fa-solid fa-user" style="color: #ffffff;"></i></i></a>
                                    @endauth
                                @endif

                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    @if (Route::has('login'))
                                        @auth
                                            <li><a class="dropdown-item" href="/dashboard">Dashboard</a></li>
                                            <hr>
                                            <li><a class="dropdown-item" href="/dashboard">Logout</a></li>
                                        @else
                                            <li><a class="dropdown-item" href="/dashboard">Login</a></li>
                                        @endauth
                                    @endif

                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>

        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</nav>
