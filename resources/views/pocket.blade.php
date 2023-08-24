@extends('layouts.app')

@section('content')
    <main id="main">
        <section id="pricing" class="pricing section-bg">
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
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-8" data-aos="zoom-in" data-aos-delay="200">
                        <form id="paymentFormSample" autocomplete="off" method="POST" action="{{route('buyPocket')}}">
                            @csrf
                            <input type="hidden" id="pocketId" name="pocketId" value="{{$package->id}}">
                            <input type="hidden" id="price" name="price" value="{{$package->price * $currencyData[Session::get('currency')]}}">
                            <input type="hidden" id="currency" name="currency" value="{{Session::get('currency')}}">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group mt-10">
                                        <small>{{trans('home.whoinveted')}}</small>
                                        <select class="form-control form-control-lg select2" id="registered_from_value" name="registeredFrom">
                                            @foreach (\App\User::getAll() as $user)
                                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group mt-10">
                                        <small>{{trans('home.presenter')}}</small>
                                        <select class="form-control form-control-lg select2" id="presenter" name="presenter">
                                            @foreach (\App\User::getPresenters() as $user)
                                                <option value="{{ $user->id }}" id="presenter_value">{{ $user->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mt-20">{{trans('home.buy')}}</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>

@endsection
