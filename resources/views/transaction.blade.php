@extends('layouts.app')

@section('content')
    <main id="main">
        <section id="pricing" class="pricing section-bg mt-5">
            <div class="container" data-aos="fade-up">
                <div class="section-title">
                    <h1>{{trans('home.paymentprocess')}}</h1>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="200">
                        <h2>Сканируйте QR для оплаты</h2>
                        <div class="box mt-2" style="display: flex; justify-content: center;">
                            <img src="{{asset('/assets/img/kaspi.jpeg')}}" alt="" style="width: 400px">
                        </div>
                        <div class="box mt-2">
                            <h3>{{$package->title}}</h3>
                            {{intval($package->price * $currencyData[Session::get('currency')])}}
                            <sup> {{Session::get('currency')}}</sup>
                            <ul>
                                <li>{{$package->description}}</li>
                            </ul>
                        </div>
                        <div class="box mt-2">
                            <h3>Реквизиты для оплаты</h3>
                            <div>
                                Компания: ТОО "BIG STAR FOR EVERYONE"
                                Адрес: Казахстан, Алматы, улица Римского-Корсакова, дом 23
                                БИН (ИИН): 210440008697
                                Банк: АО "Kaspi Bank"
                                КБе: 17
                                БИК: CASPKZKA
                                Номер счёта: KZ12722S000021920850
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-8 mt-10" data-aos="zoom-in" data-aos-delay="200">
                        <div>
                            <h4 class="mt-2">Прикрепите чек об оплате</h4>
                        </div>
                        <form id="paymentFormSample" autocomplete="off" method="POST" action="{{route('transaction')}}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" id="pocketId" name="pocketId" value="{{$package->id}}">
                            <input type="hidden" id="currency" name="currency" value="{{Session::get('currency')}}">
                            <input type="hidden" id="registeredFrom"  name="registeredFrom" value="{{$registeredFrom}}">
                            <input type="hidden" id="presenter" name="presenter" value="{{$presenter}}">
                            <input type="hidden" id="price" name="price" value="{{$package->price * $currencyData[Session::get('currency')]}}">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group mt-10">
                                        <input id="check" type="file" class="form-control form-control-lg" name="check" required>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" id="payButton" class="btn btn-primary mt-20">Оплатил</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>

@endsection
