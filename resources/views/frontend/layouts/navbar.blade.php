<nav class="navbar navbar-expand-lg main_menu" id="main_menu_area">
    <div class="container">
        <a class="navbar-brand" href="{{route('home.page')}}">
            <img src="{{asset(env('GENERAL_SETTING_IMAGE_UPLOAD_PATH').$generalSetting->logo)}}" alt="Rabins">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <i class="far fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{Route::currentRouteName() == 'home.page' ? '#home-page' : url('/')}}">Home</a>
                </li>
                @if (Route::currentRouteName() == 'home.page')

                <li class="nav-item">
                    <a class="nav-link" href="#about-page">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#portfolio-page">Portfolio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#skills-page">Skills</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#blog-page">Blog <i class="fas fa-angle-down"></i></a>
                    <ul class="sub_menu">
                        <li><a href="{{route('blogs')}}">Blog Page</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contact-page">Contact</a>
                </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
