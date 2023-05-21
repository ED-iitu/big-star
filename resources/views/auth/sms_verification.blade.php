@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Подтвердите Телефон</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('verify.sms') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="sms_code" class="col-md-4 col-form-label text-md-right">СМС</label>

                                <div class="col-md-6">
                                    <input id="sms_code" type="text" class="form-control @error('sms_code') is-invalid @enderror" name="sms_code" value="{{ old('sms_code') }}" required autocomplete="phone" autofocus>

                                    @error('sms_code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Подтвердить
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
