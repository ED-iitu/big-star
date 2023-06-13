<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

</head>
<body>
<div id="app">
    <header id="header" class="fixed-top">
        <div class="container d-flex align-items-center justify-content-between">

            <h1 class="logo"><a href="/">BIG-STAR</a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="/">{{trans('home.main')}}</a></li>
                    <li><a class="nav-link scrollto" href="/#pricing">{{trans('home.packages')}}</a></li>
                    <li><a class="nav-link scrollto" href="/#clients">Скачать приложение</a></li>
                    <li><a class="nav-link scrollto" href="/#contact">Контакты</a></li>
                    @if(Auth::user())
                        <li class="dropdown"><a href="#"><span>{{Auth::user()->name}}</span> <i class="bi bi-chevron-down"></i></a>
                            <ul>
                                <li><a href="{{route('profile')}}">Профиль</a></li>
                                <li><a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    Выйти</a></li>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </ul>
                        </li>
                    @else
                        <li><a class="getstarted" href="{{route('register')}}">Создать аккаунт</a></li>
                    @endif
                    <li class="dropdown"><a href="#"><span> {{__('languages.' . app()->getLocale())}}</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="{{route('setLocale', 'ru')}}">Русский</a></li>
                            <li><a href="{{route('setLocale', 'kz')}}">Казахский</a></li>
                            <li><a href="{{route('setLocale', 'en')}}">Английский</a></li>
                            <li><a href="{{route('setLocale', 'tr')}}">Турецкий</a></li>
                        </ul>
                    </li>

                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

    <main class="py-4">
        @yield('content')
    </main>

    <!-- ======= Footer ======= -->
    <footer id="footer">

        <div class="footer-top">
            <div class="container">
                <div class="row">

                    <div class="col-lg-4 col-md-6 footer-contact">
                        <h3>BIG-STAR</h3>
                        <p>
                            Республика Казахстан<br>
                            г. Алматы, ул. Абая 151<br>
                            Бизнес-Центр "Алатау"<br><br>
                            <strong>Phone:</strong> +1 5589 55488 55<br>
                            <strong>Email:</strong> info@example.com<br>
                        </p>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Навигация</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Главная</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Пакеты</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Контакты</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Мои ссылки</h4>
                        <ul>
                            @if(Auth::user())
                                <li><i class="bx bx-chevron-right"></i><a href="{{route('profile')}}">Профиль</a></li>
                                <li><i class="bx bx-chevron-right"></i><a href="{{route('profile')}}">История</a></li>
                                <li><i class="bx bx-chevron-right"></i><a href="{{route('profile')}}">Вывод денег</a></li>
                            @else
                                <li><i class="bx bx-chevron-right"></i><a href="{{route('register')}}">Создать аккаунт</a></li>
                                <li><i class="bx bx-chevron-right"></i><a href="{{route('login')}}">Войти</a></li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="container d-md-flex py-4">

            <div class="me-md-auto text-center text-md-start">
                <div class="copyright">
                    &copy; Copyright <strong><span>big-star.kz</span></strong>. All Rights Reserved
                </div>
                <div class="credits">

                </div>
            </div>
            <div class="social-links text-center text-md-right pt-3 pt-md-0">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
            </div>
        </div>
    </footer><!-- End Footer -->

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
</div>

<!-- Vendor JS Files -->
<script src="{{asset('assets/vendor/aos/aos.js')}}"></script>
<script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/vendor/glightbox/js/glightbox.js')}}"></script>
<script src="{{asset('assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
<script src="{{asset('assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
<script src="{{asset('assets/vendor/php-email-form/validate.js')}}"></script>

<!-- Template Main JS File -->
<script src="{{asset('assets/js/main.js')}}"></script>
</body>
</html>
