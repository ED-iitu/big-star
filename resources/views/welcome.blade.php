@extends('layouts.app')

@section('content')
               
    <section id="hero" class="hero d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 d-flex flex-column justify-content-center">
                    <h1 data-aos="fade-up">{{trans('home.text1')}}</h1>
                    <h2 data-aos="fade-up" data-aos-delay="400">{{trans('home.text2')}}</h2>
                    <div data-aos="fade-up" data-aos-delay="600">
                        <div class="text-center text-lg-start">
                            <a href="#about" class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                            <span>{{trans('home.text3')}}</span>
                            <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
                    <img src="assets/img/hero-img.png" class="img-fluid" alt="">
                </div>
            </div>
        </div>
    </section>

    <main id="main">
        <section id="about" class="about">
            <div class="container" data-aos="fade-up">
                <div class="row gx-0">
                    <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
                        <div class="content">
                            <h3>{{trans('home.aboutus')}}</h3>
                            <h2>{{trans('home.aboutussubtitle')}}</h2>
                            <p>
                                {{trans('home.aboutusdescription')}}
                            </p>
                            <div class="text-center text-lg-start">
                                <a href="#" class="btn-read-more d-inline-flex align-items-center justify-content-center align-self-center">
                                <span>{{trans('home.aboutusvideo')}}</span>
                                <i class="bi bi-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
                        <img src="assets/img/about.jpg" class="img-fluid" alt="">
                    </div>
                </div>
            </div>
        </section>

        <section id="counts" class="counts">
            <div class="container" data-aos="fade-up">
                <div class="row gy-4">
                    <div class="col-lg-3 col-md-6">
                        <div class="count-box">
                        <i class="bi bi-emoji-smile"></i>
                        <div>
                            <span data-purecounter-start="0" data-purecounter-end="5" data-purecounter-duration="1" class="purecounter"></span>
                            <p>{{trans('home.countsyears')}}</p>
                        </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="count-box">
                        <i class="bi bi-journal-richtext" style="color: #ee6c20;"></i>
                        <div>
                            <span data-purecounter-start="0" data-purecounter-end="179" data-purecounter-duration="1" class="purecounter"></span>
                            <p>{{trans('home.countscountry')}}</p>
                        </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="count-box">
                            <i class="bi bi-headset" style="color: #15be56;"></i>
                            <div>
                                <span data-purecounter-start="0" data-purecounter-end="30000" data-purecounter-duration="1" class="purecounter"></span>
                                <p>{{trans('home.countsadd')}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="count-box">
                            <i class="bi bi-people" style="color: #bb0852;"></i>
                            <div>
                                <span data-purecounter-start="0" data-purecounter-end="780000" data-purecounter-duration="1" class="purecounter"></span>
                                <p>{{trans('home.countsusers')}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


    <section id="features" class="features">
        <div class="container" data-aos="fade-up">
            <header class="section-header">
                <p>{{trans('home.featurestitle')}}</p>
            </header>
            <div class="row">
                <div class="col-lg-4">
                    <img src="assets/img/features.png" class="img-fluid" alt="">
                </div>
                <div class="col-lg-8 mt-5 mt-lg-0 d-flex">
                    <div class="row align-self-center gy-4">
                        <div class="col-md-6" data-aos="zoom-out" data-aos-delay="200">
                            <div class="feature-box d-flex align-items-center">
                                <i class="bi bi-check"></i>
                                <h3>{{trans('home.featuresfirst')}}</h3>
                            </div>
                        </div>

                        <div class="col-md-6" data-aos="zoom-out" data-aos-delay="300">
                            <div class="feature-box d-flex align-items-center">
                                <i class="bi bi-check"></i>
                                <h3>{{trans('home.featuressecond')}}</h3>
                            </div>
                        </div>

                        <div class="col-md-6" data-aos="zoom-out" data-aos-delay="400">
                            <div class="feature-box d-flex align-items-center">
                                <i class="bi bi-check"></i>
                                <h3>{{trans('home.featuresthird')}}</h3>
                            </div>
                        </div>

                        <div class="col-md-6" data-aos="zoom-out" data-aos-delay="500">
                            <div class="feature-box d-flex align-items-center">
                                <i class="bi bi-check"></i>
                                <h3>{{trans('home.featuresfourth')}}</h3>
                            </div>
                        </div>

                        <div class="col-md-6" data-aos="zoom-out" data-aos-delay="600">
                            <div class="feature-box d-flex align-items-center">
                                <i class="bi bi-check"></i>
                                <h3>{{trans('home.featuresfive')}}</h3>
                            </div>
                        </div>

                        <div class="col-md-6" data-aos="zoom-out" data-aos-delay="700">
                            <div class="feature-box d-flex align-items-center">
                                <i class="bi bi-check"></i>
                                <h3>{{trans('home.featuressix')}}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- / row -->

            <!-- ======= Pricing Section ======= -->
            <section id="pricing" class="pricing">
                <div class="container" data-aos="fade-up">
                    <header class="section-header">
                        <p>{{trans('home.packages')}}</p>
                    </header>
                    <div class="row gy-4" data-aos="fade-left">
                        @if(!empty($packages))
                            @foreach($packages as $package)
                                <div class="row gy-4" data-aos="fade-left">
                                <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="200">
                                    <div class="box">
                                        <span class="featured">{{$package->getTranslatedAttribute('tag', Session::get('locale'), 'fallbackLocale')??'Выгодный'}}</span>
                                        <h3>{{$package->getTranslatedAttribute('title', Session::get('locale'), 'fallbackLocale')}}</h3>
                                        <div class="price">{{intval($package->price * $currencyData[Session::get('currency')])}}<span> {{Session::get('currency')}}</span></div>
                                        <ul>
                                            <li>{{$package->getTranslatedAttribute('description', Session::get('locale'), 'fallbackLocale')}}</li>
                                        </ul>
                                        <a href="{{route('package', $package->id)}}" class="btn-buy">{{trans('home.buy')}}</a>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </section>

        <!-- ======= Portfolio Section ======= -->
        <section id="portfolio" class="portfolio">
            <div class="container" data-aos="fade-up">
                <div class="section-title">
                    <h2>{{trans('home.introvideo')}}</h2>
                </div>
                <div class="row">
                    <div class="col-lg-12 d-flex justify-content-center">
                        <ul id="portfolio-flters">
                            <li data-filter="*" class="filter-active">{{trans('home.all')}}</li>
                            <li data-filter=".filter-app">{{trans('home.website')}}</li>
                            <li data-filter=".filter-card">{{trans('home.meesenger')}}</li>
                        </ul>
                    </div>
                </div>
                <div class="row portfolio-container">
                    @if(count($videos) > 0)
                        @foreach($videos as $video)
                            <div class="col-lg-6 col-md-6 portfolio-item {{$video->type ?? '.filter-app'}}">
                                <iframe width="600" height="350" src="{{$video->link}}" title="{{$video->title}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </section><!-- End Portfolio Section -->

        <section id="recent-blog-posts" class="recent-blog-posts">
            <div class="container" data-aos="fade-up">
                <header class="section-header">
                    <p>{{trans('home.news')}}</p>
                </header>
                <div class="row">
                    @if(!empty($news))
                        @foreach($news as $post)
                            <div class="col-lg-4 mt-20">
                                <div class="post-box">
                                    <div class="post-img"><img src="{{asset('/storage/'. $post->image)}}" class="img-fluid" alt=""></div>
                                    <span class="post-date">{{$post->date}}</span>
                                    <h3 class="post-title">{{$post->title}}</h3>
                                    <div class="btn-wrap">
                                        <a href="{{route('news', $post->id)}}" class="readmore stretched-link mt-auto"><span>{{trans('home.read')}}</span><i class="bi bi-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </section>

        <section id="testimonials" class="testimonials">
            <div class="container" data-aos="fade-up">
                <header class="section-header">
                    <p>{{trans('home.team')}}</p>
                </header>
                <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="200">
                    <div class="swiper-wrapper">
                        @if(!empty(\App\User::getAllPresenters()))
                            @foreach(\App\User::getAllPresenters() as $user)
                                <div class="swiper-slide">
                                    <div class="testimonial-item">
                                        <div class="profile mt-auto">
                                            <img src="{{asset('/storage/' . $user->avatar)}}" class="testimonial-img" alt="">
                                            <h3>{{ $user->name }}</h3>
                                            <h4>{{trans('home.presenter')}}</h4>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </section>


        <section id="faq" class="faq">
            <div class="container" data-aos="fade-up">
                <header class="section-header">
                    <p>{{trans('home.faq')}}</p>
                </header>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="accordion accordion-flush" id="faqlist1">
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-1">
                                        Как начать пользоваться приложением?
                                    </button>
                                </h2>
                                <div id="faq-content-1" class="accordion-collapse collapse" data-bs-parent="#faqlist1">
                                    <div class="accordion-body">
                                        Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus laoreet non curabitur gravida. Venenatis lectus magna fringilla urna porttitor rhoncus dolor purus non.
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-2">
                                        Как зарегистрироваться?
                                    </button>
                                </h2>
                                <div id="faq-content-2" class="accordion-collapse collapse" data-bs-parent="#faqlist1">
                                    <div class="accordion-body">
                                        Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-3">
                                        Как рекламироваться внутри приложения?
                                    </button>
                                </h2>
                                <div id="faq-content-3" class="accordion-collapse collapse" data-bs-parent="#faqlist1">
                                    <div class="accordion-body">
                                        Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci. Faucibus pulvinar elementum integer enim. Sem nulla pharetra diam sit amet nisl suscipit. Rutrum tellus pellentesque eu tincidunt. Lectus urna duis convallis convallis tellus. Urna molestie at elementum eu facilisis sed odio morbi quis
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="accordion accordion-flush" id="faqlist2">
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2-content-1">
                                        Как зарабатывать вместе с нами?
                                    </button>
                                </h2>
                                <div id="faq2-content-1" class="accordion-collapse collapse" data-bs-parent="#faqlist2">
                                    <div class="accordion-body">
                                        Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2-content-2">
                                        Как купить пакет?
                                    </button>
                                </h2>
                                <div id="faq2-content-2" class="accordion-collapse collapse" data-bs-parent="#faqlist2">
                                    <div class="accordion-body">
                                        Molestie a iaculis at erat pellentesque adipiscing commodo. Dignissim suspendisse in est ante in. Nunc vel risus commodo viverra maecenas accumsan. Sit amet nisl suscipit adipiscing bibendum est. Purus gravida quis blandit turpis cursus in
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2-content-3">
                                        Когда я буду получать деньги?
                                    </button>
                                </h2>
                                <div id="faq2-content-3" class="accordion-collapse collapse" data-bs-parent="#faqlist2">
                                    <div class="accordion-body">
                                        Laoreet sit amet cursus sit amet dictum sit amet justo. Mauris vitae ultricies leo integer malesuada nunc vel. Tincidunt eget nullam non nisi est sit amet. Turpis nunc eget lorem dolor sed. Ut venenatis tellus in metus vulputate eu scelerisque. Pellentesque diam volutpat commodo sed egestas egestas fringilla phasellus faucibus. Nibh tellus molestie nunc non blandit massa enim nec.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section id="contact" class="contact">
            <div class="container" data-aos="fade-up">
                <header class="section-header">
                    <p>{{trans('home.contacts')}}</p>
                </header>

                <div class="row gy-4">
                    <div class="col-lg-12">
                        <div class="row gy-4">
                            <div class="col-md-12">
                                <div class="info-box">
                                    <i class="bi bi-geo-alt"></i>
                                    <h3>{{trans('home.adressandphone')}}</h3>
                                    <p>
                                        <strong>Головной офис г.Алматы,</strong> ул. Оспанова 26. Тел: +7 747 360 38 17<br>
                                        <strong>Филиал в г.Алматы,</strong> БЦ Алатау 610 офис. Тел: +7 776 518 76 70<br>
                                        <strong>Филиал в г.Астана,</strong> ул.Иманова 19, Деловой Дом "Алматы", 7 этаж, № 709 офис. Тел: +7 747 602 14 03<br>
                                        <strong>Филиал в г.Караганда,</strong> ул.Гоголя 34/2, Бизнес Центр "Прайм", № 201 офис.	Тел: +7 747 360 38 21<br>
                                        <strong>Филиал в г.Темиртау,</strong> 6 мкр, 20 дом, ТД "Талис". Тел: +7 708 395 62 15, +7 701 282 91 85<br>
                                        <strong>Филиал в г.Атырау,</strong> ул.Жарбосынова 62, рядом ТЦ «Байзар». Тел: +7 778 246 35 66<br>
                                        <strong>Филиал в г.Павлодар,</strong> ул.Сатпаева 71, БЦ «Казахстан», № 102 офис. Тел: +7 705 385 74 88, +7 778 842 86 94<br>
                                        <strong>Филиал в г.Уральск,</strong> Бизнес Центр "Мухита" 78, 2 этаж, № 205 офис. Тел: +7 747 679 73 96<br>
                                        <strong>Филиал в г.Актобе,</strong> БЦ "Мир", ул.Абилхаир Хана 85, 4 этаж, № 411 офис. Тел: +7 776 680 44 88, +7 747 365 51 75<br>
                                        <strong>Филиал в г.Балхаш,</strong> ул.М.Казыбековой, 24. Тел: +7 776 234 1189
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="row gy-4">
                            <div class="col-md-6">
                                <div class="info-box">
                                    <i class="bi bi-envelope"></i>
                                    <h3>Email</h3>
                                    <p>info@example.com<br>contact@example.com</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-box">
                                    <i class="bi bi-clock"></i>
                                    <h3>{{trans('home.worktime')}}</h3>
                                    <p>{{trans('home.weekdays')}}<br>9:00 - 18:00</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>


@endsection
