@extends('layouts.app')

@section('content')
    <main id="main">

        <!-- ======= Hero Section ======= -->
        <section id="hero" class="d-flex align-items-center">
            <div class="container d-flex flex-column align-items-center justify-content-center" data-aos="fade-up">
                <h1>Лучшее приложение для пассивного дохода</h1>
                <h2>Что такое BigStar Messenger?</h2>
                <a href="#services" class="btn-get-started scrollto">Подробнее</a>
                <img src="assets/img/hero-img.png" class="img-fluid hero-img" alt="" data-aos="zoom-in" data-aos-delay="150">
            </div>
        </section><!-- End Hero -->

        
        <!-- ======= Services Section ======= -->
        <section id="services" class="services">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>О приложении</h2>
                </div>

                <div class="row">
                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="fade-up" data-aos-delay="100">
                        <div class="icon-box">
                            <div class="icon"><i class="bx bxl-dribbble"></i></div>
                            <h4 class="title"><a href="">Облако</a></h4>
                            <p class="description">Облочный мобильный мессенджер с синхронизацией на нескольких устройствах одновременно</p>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="fade-up" data-aos-delay="200">
                        <div class="icon-box">
                            <div class="icon"><i class="bx bx-user"></i></div>
                            <h4 class="title"><a href="">Команда</a></h4>
                            <p class="description">Мессенджер разработан отвечственной командой, включает в себя самые важные и ключевые функции мессенджеров</p>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="fade-up" data-aos-delay="300">
                        <div class="icon-box">
                            <div class="icon"><i class="bx bx-layer"></i></div>
                            <h4 class="title"><a href="">Платформы</a></h4>
                            <p class="description">Приложение работает как и на IOS, так и на Android</p>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="fade-up" data-aos-delay="400">
                        <div class="icon-box">
                            <div class="icon"><i class="bx bx-tachometer"></i></div>
                            <h4 class="title"><a href="">Защита и скорость</a></h4>
                            <p class="description">Безопасное и быстрое соединение в более 150 странах мира без оплаты</p>
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End Services Section -->
        

        <!-- ======= Clients Section ======= -->
        <section id="clients" class="clients">
            <div class="container" data-aos="zoom-in">
                <div class="row">
                    <div class="col-md-12 flex-block social-btns">
                        <a class="app-btn blu flex vert" href="http:apple.com" target="_blank">
                            <i class="fab fa-apple"></i>
                            <p>Available on the <br /> <span class="big-txt">App Store</span></p>
                        </a>
                        <a class="app-btn blu flex vert" href="http:google.com" target="_blank">
                            <i class="fab fa-google-play"></i>
                            <p>Get it on <br /> <span class="big-txt">Google Play</span></p>
                        </a>
                        <a class="app-btn blu flex vert" href="http:alphorm.com" target="_blank">
                            <i class="fas fa-desktop"></i>
                            <p>Web <br /> <span class="big-txt">Application</span></p>
                        </a>
                    </div>
                </div>
            </div>
        </section><!-- End Clients Section -->

        <!-- ======= Features Section ======= -->
        <section id="features" class="features" data-aos="fade-up">
            <div class="container">

                <div class="section-title">
                    <h2>Преимущества</h2>
                </div>

                <div class="row content">
                    <div class="col-md-5" data-aos="fade-right" data-aos-delay="100">
                        <img src="assets/img/features-1.png" class="img-fluid" alt="">
                    </div>
                    <div class="col-md-7 pt-4" data-aos="fade-left" data-aos-delay="100">
                        <h3>Чат</h3>
                        <p class="fst-italic">
                            Почему наш чат лучше других:
                        </p>
                        <ul>
                            <li><i class="bi bi-check"></i> Секретные сообщения с кодировкой, все ваши сообщения будут зашифрованы</li>
                            <li><i class="bi bi-check"></i> Мульти-переводчик более чем на 179 языков мира, теперь без переводчиков</li>
                            <li><i class="bi bi-check"></i> Переобразовывать аудио в текст, для полного удобства в мессенджере</li>
                            <li><i class="bi bi-check"></i> Рассылка сообщений большому количеству адресатов за раз</li>
                        </ul>
                    </div>
                </div>

                <div class="row content">
                    <div class="col-md-5 order-1 order-md-2" data-aos="fade-left">
                        <img src="assets/img/features-2.png" class="img-fluid" alt="">
                    </div>
                    <div class="col-md-7 pt-5 order-2 order-md-1" data-aos="fade-right">
                        <h3>Видеоконференции</h3>
                        <p class="fst-italic">
                            Теперь еще лучше, а именно:
                        </p>
                        <ul>
                            <li><i class="bi bi-check"></i> Неограниченное время для проведения видеоконференций</li>
                            <li><i class="bi bi-check"></i> Демонстрация экрана и видеокамеры, для полного удобства</li>
                            <li><i class="bi bi-check"></i> Неограниченное количество пользователей, как и для больших конференций и малые</li>
                            <li><i class="bi bi-check"></i> Возможность звонить с компьютера на телефон и принимать звонки, имеется web версия</li>
                        </ul>
                    </div>
                </div>

                <div class="row content">
                    <div class="col-md-5" data-aos="fade-right">
                        <img src="assets/img/features-3.png" class="img-fluid" alt="">
                    </div>
                    <div class="col-md-7 pt-5" data-aos="fade-left">
                        <h3>Облачное хранилище</h3>
                        <p>Не знаете где хранить фотографии, видео и файлы, есть решение:</p>
                        <ul>
                            <li><i class="bi bi-check"></i> Облачное хранилище с возможностью увеличения объема (старндрт: 5гб)</li>
                            <li><i class="bi bi-check"></i> Отправка документов, фото и видео больших размеров без сжатия в отличном качестве</li>
                            <li><i class="bi bi-check"></i> Поодержка большинства форматов файлов - MP3, MP4, AVI, FLV, gif, png, jpg и другие</li>
                            <li><i class="bi bi-check"></i> Высокие разрешения видеофайла 1080p</li>
                        </ul>
                    </div>
                </div>

                <div class="row content">
                    <div class="col-md-5 order-1 order-md-2" data-aos="fade-left">
                        <img src="assets/img/features-4.png" class="img-fluid" alt="">
                    </div>
                    <div class="col-md-7 pt-5 order-2 order-md-1" data-aos="fade-right">
                        <h3>VIP пользователи</h3>
                        <p class="fst-italic">
                            Также мы предусмотрели подписку для VIP пользователи, их преимущества:
                        </p>
                        <ul>
                            <li><i class="bi bi-check"></i> Отключение рекламы полностью и золотой фон с обременением в мессенеджере</li>
                            <li><i class="bi bi-check"></i> Выбора до 10-ти фотографии профиля и возможность звонков через BigStar в WhatsApp или Telegram</li>
                            <li><i class="bi bi-check"></i> Создания одной публичной группы, куда могут вступить все пользователи мессенджера</li>
                            <li><i class="bi bi-check"></i> Возможность живых смайликов при видеозвонках</li>
                        </ul>
                    </div>
                </div>

            </div>
        </section><!-- End Features Section -->

       


        <!-- ======= Portfolio Section ======= -->
        <section id="portfolio" class="portfolio">
            <div class="container" data-aos="fade-up">
                <div class="section-title">
                    <h2>Видеоинструкция</h2>
                </div>
                <div class="row">
                    <div class="col-lg-12 d-flex justify-content-center">
                        <ul id="portfolio-flters">
                            <li data-filter="*" class="filter-active">Все</li>
                            <li data-filter=".filter-app">Сайт Big-Star.kz</li>
                            <li data-filter=".filter-card">Мессенджер</li>
                        </ul>
                    </div>
                </div>
                <div class="row portfolio-container">
                    <div class="col-lg-6 col-md-6 portfolio-item filter-app">
                        <iframe width="600" height="350" src="https://www.youtube.com/embed/WQ7ZijkrB3s" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                    </div>
                    <div class="col-lg-6 col-md-6 portfolio-item filter-card">
                        <iframe width="600" height="350" src="https://www.youtube.com/embed/WQ7ZijkrB3s" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </section><!-- End Portfolio Section -->

        <!-- ======= Pricing Section ======= -->
        <section id="pricing" class="pricing section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Пакеты</h2>
                </div>

                <div class="row">

                    @if(!empty($packages))
                        @foreach($packages as $package)
                            <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="200">
                                <div class="box">
                                    <h3>{{$package->title}}</h3>
                                    <h4>{{$package->price}} <sup> KZT</sup></h4>
                                    <ul>
                                        <li>{{$package->description}}</li>
                                    </ul>
                                    <div class="btn-wrap">
                                        <a href="#" class="btn-buy">Купить</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif


{{--                    <div class="col-lg-4 col-md-6 mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="100">--}}
{{--                        <div class="box featured">--}}
{{--                            <h3>Business</h3>--}}
{{--                            <h4><sup>$</sup>19<span> / month</span></h4>--}}
{{--                            <ul>--}}
{{--                                <li>Aida dere</li>--}}
{{--                                <li>Nec feugiat nisl</li>--}}
{{--                                <li>Nulla at volutpat dola</li>--}}
{{--                                <li>Pharetra massa</li>--}}
{{--                                <li class="na">Massa ultricies mi</li>--}}
{{--                            </ul>--}}
{{--                            <div class="btn-wrap">--}}
{{--                                <a href="#" class="btn-buy">Buy Now</a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

                </div>

            </div>
        </section><!-- End Pricing Section -->

    

        <!-- ======= Frequently Asked Questions Section ======= -->
        <section id="faq" class="faq">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Вопрос - Ответ</h2>
                </div>

                <ul class="faq-list">

                    <li>
                        <div data-bs-toggle="collapse" class="collapsed question" href="#faq1">Non consectetur a erat nam at lectus urna duis? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
                        <div id="faq1" class="collapse" data-bs-parent=".faq-list">
                            <p>
                                Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus laoreet non curabitur gravida. Venenatis lectus magna fringilla urna porttitor rhoncus dolor purus non.
                            </p>
                        </div>
                    </li>

                    <li>
                        <div data-bs-toggle="collapse" href="#faq2" class="collapsed question">Feugiat scelerisque varius morbi enim nunc faucibus a pellentesque? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
                        <div id="faq2" class="collapse" data-bs-parent=".faq-list">
                            <p>
                                Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.
                            </p>
                        </div>
                    </li>

                    <li>
                        <div data-bs-toggle="collapse" href="#faq3" class="collapsed question">Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
                        <div id="faq3" class="collapse" data-bs-parent=".faq-list">
                            <p>
                                Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci. Faucibus pulvinar elementum integer enim. Sem nulla pharetra diam sit amet nisl suscipit. Rutrum tellus pellentesque eu tincidunt. Lectus urna duis convallis convallis tellus. Urna molestie at elementum eu facilisis sed odio morbi quis
                            </p>
                        </div>
                    </li>

                    <li>
                        <div data-bs-toggle="collapse" href="#faq4" class="collapsed question">Ac odio tempor orci dapibus. Aliquam eleifend mi in nulla? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
                        <div id="faq4" class="collapse" data-bs-parent=".faq-list">
                            <p>
                                Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.
                            </p>
                        </div>
                    </li>

                    <li>
                        <div data-bs-toggle="collapse" href="#faq5" class="collapsed question">Tempus quam pellentesque nec nam aliquam sem et tortor consequat? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
                        <div id="faq5" class="collapse" data-bs-parent=".faq-list">
                            <p>
                                Molestie a iaculis at erat pellentesque adipiscing commodo. Dignissim suspendisse in est ante in. Nunc vel risus commodo viverra maecenas accumsan. Sit amet nisl suscipit adipiscing bibendum est. Purus gravida quis blandit turpis cursus in
                            </p>
                        </div>
                    </li>

                    <li>
                        <div data-bs-toggle="collapse" href="#faq6" class="collapsed question">Tortor vitae purus faucibus ornare. Varius vel pharetra vel turpis nunc eget lorem dolor? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
                        <div id="faq6" class="collapse" data-bs-parent=".faq-list">
                            <p>
                                Laoreet sit amet cursus sit amet dictum sit amet justo. Mauris vitae ultricies leo integer malesuada nunc vel. Tincidunt eget nullam non nisi est sit amet. Turpis nunc eget lorem dolor sed. Ut venenatis tellus in metus vulputate eu scelerisque. Pellentesque diam volutpat commodo sed egestas egestas fringilla phasellus faucibus. Nibh tellus molestie nunc non blandit massa enim nec.
                            </p>
                        </div>
                    </li>

                </ul>

            </div>
        </section><!-- End Frequently Asked Questions Section -->

        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Контакты</h2>
                </div>

                <div class="row">

                    <div class="col-lg-6">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="info-box">
                                    <i class="bx bx-map"></i>
                                    <h3>Our Address</h3>
                                    <p>A108 Adam Street, New York, NY 535022</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-box mt-4">
                                    <i class="bx bx-envelope"></i>
                                    <h3>Email Us</h3>
                                    <p>info@example.com<br>contact@example.com</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-box mt-4">
                                    <i class="bx bx-phone-call"></i>
                                    <h3>Call Us</h3>
                                    <p>+1 5589 55488 55<br>+1 6678 254445 41</p>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-lg-6 mt-4 mt-md-0">
                        <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                                </div>
                                <div class="col-md-6 form-group mt-3 mt-md-0">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
                            </div>
                            <div class="form-group mt-3">
                                <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
                            </div>
                            <div class="my-3">
                                <div class="loading">Loading</div>
                                <div class="error-message"></div>
                                <div class="sent-message">Your message has been sent. Thank you!</div>
                            </div>
                            <div class="text-center"><button type="submit">Send Message</button></div>
                        </form>
                    </div>

                </div>

            </div>
        </section><!-- End Contact Section -->

    </main><!-- End #main -->
@endsection
