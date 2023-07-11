@extends('layouts.app')

@section('content')
<section class="vh-80">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-xl-9">
                    <h1 class="mb-4">Подтверждение номера телефона</h1>
                    @if(Session::has('error'))
                        <div class="alert alert-danger">
                            {{ Session::get('error') }}
                        </div>
                    @endif
                    <div class="card" style="border-radius: 10px;">
                        <form method="POST" action="{{ route('verify.sms') }}">
                            @csrf
                            <div class="card-body">
                                <div class="row align-items-center pt-4 pb-3">
                                    <div class="col-md-3 ps-5">
                                        <h6 class="mb-0">Введите смс-код</h6>
                                    </div>
                                <div class="col-md-9 pe-5">
                                    <input id="sms_code" type="text" class="form-control form-control-lg @error('sms_code') is-invalid @enderror" name="sms_code" value="{{ old('sms_code') }}" required autocomplete="phone" autofocus>
                                    @error('sms_code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="px-5 py-4">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    Подтвердить
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
