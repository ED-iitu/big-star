@extends('layouts.app')

@section('content')

    <main id="main">
        <section id="pricing" class="pricing section-bg mt-5">
        <div class="container">
            <div class="col-md-12">
                <div class="align-content-xxl-center">
                    <h1 style="text-align: center">Спасибо за покупку пакета! Заявка на оплату будет расмотрена модератором!</h1>
                    <h2 style="text-align: center">Перейди в <a href="{{route('profile')}}">Личный кабинет</a></h2>
                </div>
            </div>
        </div>
        </section>
    </main>
@endsection
