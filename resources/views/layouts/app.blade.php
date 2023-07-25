<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">

        <title>big-star.kz</title>
        <meta content="" name="description">
        <meta content="" name="keywords">

        <!-- Favicons -->
        <link href="{{asset('assets/img/favicon.png')}}" rel="icon">
        <link href="{{'assets/img/apple-touch-icon.png'}}" rel="apple-touch-icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
        <!-- Vendor CSS Files -->
        <link href="{{asset('assets/vendor/aos/aos.css')}}" rel="stylesheet">
        <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
        <link href="{{asset('assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
        <link href="{{asset('assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
        <link href="{{asset('assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

        <!-- Template Main CSS File -->
        <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
    </head>
<body>
<div id="app">
    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

        <a href="/" class="logo d-flex align-items-center">
            <img src="{{asset('assets/img/logo.png')}}" alt="">
            <span>BigStar</span>
        </a>

        <nav id="navbar" class="navbar">
            <ul>
            <li><a class="nav-link active" href="/">{{trans('home.main')}}</a></li>
            <li><a class="nav-link" href="/#pricing">{{trans('home.packages')}}</a></li>
            <li><a class="nav-link" href="/#features">{{trans('home.app')}}</a></li>
            <li><a class="nav-link" href="/#recent-blog-posts">{{trans('home.news')}}</a></li>
            <li><a class="nav-link" href="/#contact">{{trans('home.contacts')}}</a></li>
            <li class="dropdown"><a><span>{{__('languages.' . app()->getLocale())}}</span> <i class="bi bi-chevron-down"></i></a>
                <ul>
                    <li><a href="{{route('setLocale', 'ru')}}">Русский</a></li>
                    <li><a href="{{route('setLocale', 'kz')}}">Қазақ</a></li>
                    <li><a href="{{route('setLocale', 'en')}}">English</a></li>
                    <li><a href="{{route('setLocale', 'tr')}}">Türkçe</a></li>
                </ul>
            </li>
            <li class="dropdown"><a><span>{{Session::get('currency') ?? 'KZT'}}</span> <i class="bi bi-chevron-down"></i></a>
                <ul>
                <li><a href="{{route('setCurrency', 'KZT')}}">KZT</a></li>
                <li><a href="{{route('setCurrency', 'USD')}}">USD</a></li>
                <li><a href="{{route('setCurrency', 'RUB')}}">RUB</a></li>
                <li><a href="{{route('setCurrency', 'TRY')}}">TRY</a></li>
                </ul>
            </li>
                @if(Auth::user())
                <li class="dropdown"><a href="#"><span>{{Auth::user()->name}}</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a href="{{route('profile')}}">{{trans('home.profile')}}</a></li>
                        <li><a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                            {{trans('home.logout')}}</a></li>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </ul>
                </li>
                @else
                <li><a class="getstarted scrollto" href="{{route('register')}}">{{trans('home.create')}}</a></li>
                @endif
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->


    <main class="py-4">
        @yield('content')
    </main>


  <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row gy-4">
                    <div class="col-lg-4 col-md-12 footer-info">
                        <a href="/" class="logo d-flex align-items-center">
                            <img src="{{asset('assets/img/logo.png')}}" alt="">
                            <span>BigStar</span>
                        </a>
                        <div class="col-lg-12 col-md-12 footer-contact text-center text-md-start">
                            <p class="text-left">
                                <strong>{{trans('home.adress')}}:</strong> {{trans('home.kzadress')}}<br>
                                <strong>{{trans('home.phone')}}:</strong> {{trans('home.kzphone')}} 
                            </p>
                        </div>
                        <div class="social-links mt-3">
                            <a href="https://api.whatsapp.com/send?phone=77711768679" class="whatsapp"><i class="bi bi-whatsapp"></i></a>
                            <a href="https://www.instagram.com/bigstar_kz/?igshid=MzRlODBiNWFlZA%3D%3D" class="instagram"><i class="bi bi-instagram"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-6 footer-links">
                        <h4>Навигация</h4>
                        <ul>
                            <li><a href="/">{{trans('home.main')}}</a></li>
                            <li><a href="/#pricing">{{trans('home.packages')}}</a></li>
                            <li><a href="/#app">{{trans('home.app')}}</a></li>
                            <li><a href="/#recent-blog-posts">{{trans('home.news')}}</a></li>
                            <li><a href="/#contact">{{trans('home.contacts')}}</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-4 col-6 footer-links">
                        <h4>Мои ссылки</h4>
                        <ul>
                            @if(Auth::user())
                                <li><i class="bx bx-chevron-right"></i><a href="{{route('profile')}}">{{trans('home.profile')}}</a></li>
                                <li><i class="bx bx-chevron-right"></i><a href="{{route('profile')}}">{{trans('home.history')}}</a></li>
                                <li><i class="bx bx-chevron-right"></i><a href="{{route('profile')}}">{{trans('home.cashout')}}</a></li>
                            @else
                                <li><i class="bx bx-chevron-right"></i><a href="{{route('register')}}">{{trans('home.create')}}</a></li>
                                <li><i class="bx bx-chevron-right"></i><a href="{{route('login')}}">{{trans('home.login')}}</a></li>
                            @endif
                            
                            <li><i class="bx bx-chevron-right"></i><a href="{{asset('assets/doc/public_offer.pdf')}}" target="_blank">{{trans('home.public_offer')}}</a></li>
                                <li><i class="bx bx-chevron-right"></i><a href="{{asset('assets/doc/dogovor.pdf')}}" target="_blank">{{trans('home.info_onlinepayments')}}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="copyright">
                &copy; Copyright <strong><span>big-star.kz</span></strong>. All Rights Reserved
            </div>
        </div>
    </footer><!-- End Footer -->
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="{{asset('assets/vendor/purecounter/purecounter_vanilla.js')}}"></script>
<script src="{{asset('assets/vendor/aos/aos.js')}}"></script>
<script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/vendor/glightbox/js/glightbox.js')}}"></script>
<script src="{{asset('assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
<script src="{{asset('assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
<script src="{{asset('assets/vendor/php-email-form/validate.js')}}"></script>

<!-- Template Main JS File -->
<script src="{{asset('assets/js/main.js')}}"></script>

<script>
    jQuery(document).ready(function($) {
        // Apply phone mask to the input with id 'phone'
        $('#phone').inputmask({
            mask: '+999999999999', // Change this to match the desired phone mask pattern
            placeholder: '', // Remove this line if you want to show a placeholder character
            showMaskOnHover: false, // Remove this line if you want to show the mask on hover
            showMaskOnFocus: false, // Remove this line if you want to show the mask on focus
            showMaskOnBlur: true // Remove this line if you want to hide the mask on blur
        });
    });
</script>
</body>
</html>
