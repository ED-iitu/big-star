@extends('layouts.app')

@section('content')
    <script src="https://widget.cloudpayments.kz/bundles/cloudpayments.js"></script>

    <main id="main">
        <section id="pricing" class="pricing section-bg vh-80">
            <div class="container" data-aos="fade-up">
                <div class="section-title">
                    <h2>Покупка пакета</h2>
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
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-8" data-aos="zoom-in" data-aos-delay="200">
                        <form id="paymentFormSample" autocomplete="off">
                            @csrf
                            <input type="hidden" id="pocketId" value="{{$package->id}}">
                            <input type="hidden" id="price" value="{{$package->price * $currencyData[Session::get('currency')]}}">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group mt-10">
                                        <small>Кто пригласил?</small>
                                        <select class="form-control form-control-lg select2" id="registered_from_value">
                                            @foreach (\App\User::getAll() as $user)
                                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group mt-10">
                                        <small>Презентер</small>
                                        <select class="form-control form-control-lg select2" id="presenter" name="presenter">
                                            @foreach (\App\User::getPresenters() as $user)
                                                <option value="{{ $user->id }}" id="presenter_value">{{ $user->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <button type="button" id="payButton" class="btn btn-primary mt-20">Купить пакет</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>

<script>
    let btn = document.getElementById("payButton")

    function pay() {
        //let language = navigator.language //or fix
        let language = "ru-RU"

        let price        = parseInt(document.getElementById("price").value)
        const csrfToken  = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        let pocketId     = parseInt(document.getElementById("pocketId").value)
        var registerFrom = parseInt(document.getElementById("registered_from_value").value)
        var presenter    = parseInt(document.getElementById("presenter_value").value)
        let currency     = "{{Session::get('currency')}}";

        console.log(registerFrom)

        var widget = new cp.CloudPayments({
            applePaySupport: false,
            googlePaySupport: false,
            yandexPaySupport: false,
            tinkoffInstallmentSupport: false,
            language: language
        })
        widget.pay('auth', // или 'charge'
            { //options
                publicId: 'pk_ff33fc6f378003773cc43ec8f5b9e', //id из личного кабинета
                description: 'Оплата товаров в big-star.kz', //назначение
                amount: price, //сумма
                currency: currency, //валюта
                accountId: 'user@example.com', //идентификатор плательщика (необязательно)
                invoiceId: '1234567', //номер заказа  (необязательно)
                skin: "mini", //дизайн виджета (необязательно)
                autoClose: 3
            }, {
                onSuccess: function(options) { // success
                    fetch('{{route('buyPocket')}}', {
                        method: 'POST',
                        headers: {
                            'Accept': 'application/json',
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': csrfToken // Передача токена CSRF в заголовках запроса

                        },
                        body: JSON.stringify({"pocketId": pocketId, "registeredFrom": registerFrom, "presenter": presenter})
                    })
                        .then(response => response.json())
                        .then(response => console.log(JSON.stringify(response)))
                },
                onFail: function(reason, options) { // fail
                    //действие при неуспешной оплате
                    console.log('FAIL')
                    console.log(reason)
                    console.log(options)
                },
                onComplete: function(paymentResult, options) { //Вызывается как только виджет получает от api.cloudpayments ответ с результатом транзакции.
                    //например вызов вашей аналитики Facebook Pixel
                }
            }
        )
    }

    //window.addEventListener('load', pay)
    btn.addEventListener('click', pay)
</script>

@endsection
