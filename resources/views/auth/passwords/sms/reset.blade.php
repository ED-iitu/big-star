@extends('layouts.app')

@section('content')
    <section class="vh-80">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-xl-9">
                    <h1 class="mb-4">Сброс пароля</h1>
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if (session()->has('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    <div class="card" style="border-radius: 10px;">
                        <form method="POST" action="{{ route('password.resetPasswordBySms') }}">
                            @csrf
{{--                            <input type="hidden" name="token" value="{{ $token }}">--}}
                            <input type="hidden" name="phone" value="{{ $phone }}">
                            <div class="card-body">
                                <div class="row align-items-center pt-4 pb-3">
                                    <div class="col-md-3 ps-5">
                                        <h6 class="mb-0">Введите смс-код</h6>
                                    </div>
                                <div class="col-md-9 pe-5">
                                    <input id="code" type="text" class="form-control form-control-lg @error('code') is-invalid @enderror" name="code" required autocomplete="email" autofocus>

                                    @error('code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row align-items-center py-3">
                                <div class="col-md-3 ps-5">
                                    <h6 class="mb-0">Новый пароль</h6>
                                </div>
                                <div class="col-md-9 pe-5">
                                    <input id="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row align-items-center py-3">
                                <div class="col-md-3 ps-5">
                                    <h6 class="mb-0">Подтвердите пароль</h6>
                                </div>
                                <div class="col-md-9 pe-5">
                                <input id="password-confirm" type="password" class="form-control form-control-lg" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>
                            <hr class="mx-n3">
                            <div class="px-5 py-4">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    {{ __('Reset Password') }}
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
