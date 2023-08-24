@extends('layouts.app')

@section('content')
    <main id="main">
        <section id="pricing" class="pricing section-bg mt-5">
            <div class="container" data-aos="fade-up">
                <div class="section-title">
                    <h2>{{trans('home.paymentprocess')}}</h2>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="200">
                        <div class="box">
                            <h3>{{$package->title}}</h3>
                            {{intval($package->price * $currencyData[Session::get('currency')])}}
                            <sup> {{Session::get('currency')}}</sup>
                            <ul>
                                <li>{{$package->description}}</li>
                            </ul>
                            <h4>Реквизиты для оплаты</h4>
                            <ul>
                                <li>Телефон: 87717469953</li>
                                <li>Номер карты: 0000 0000 0000 0000</li>
                                <li>Номер счета: 0000 0000 0000 0000</li>
                            </ul>
                        </div>
                        <div class="box mt-2" >
                            <img src="{{asset('/assets/img/kaspi.webp')}}" alt="" style="width: 400px;">
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-8" data-aos="zoom-in" data-aos-delay="200">
                        <div>
                            <h4>Прикрепите чек об оплате</h4>
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
