
@extends('layouts.app')

@section('content')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<div class="container p-0 mt-5 pt-5">
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
    <h1 class="h3 mb-3">Личный кабинет</h1>
    <div class="row">
        <div class="col-md-5 col-xl-4">
            <div class="card">
                <div class="list-group list-group-flush" role="tablist">
                    <a class="list-group-item list-group-item-action active" data-toggle="list" href="#account" role="tab">
                        {{trans('home.myinfo')}}
                    </a>
                    <a class="list-group-item list-group-item-action" data-toggle="list" href="#password" role="tab">
                        {{trans('home.changepassword')}}
                    </a>
                    <a class="list-group-item list-group-item-action" data-toggle="list" href="#transaction" role="tab">
                        {{trans('home.transactions')}}
                    </a>
                    <a class="list-group-item list-group-item-action" data-toggle="list" href="#withdraw" role="tab">
                        {{trans('home.withdraw')}}
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-7 col-xl-8">
            <div class="tab-content">
                <div class="tab-pane fade show active" id="account" role="tabpanel">

                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">{{trans('home.myinfo')}}</h5>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{route('profile.updateProfile')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="inputUsername">{{trans('home.fio')}}</label>
                                            <input type="text" class="form-control form-control-lg" id="inputUsername" placeholder="ФИО" name="name" value="{{Auth::user()->name}}">
                                        </div>
                                        <div class="form-group mt-10">
                                            <label for="inputUsername">E-mail</label>
                                            <input type="text" class="form-control form-control-lg" id="inputUsername" name="email" placeholder="E-mail" value="{{Auth::user()->email}}">
                                        </div>
                                        <div class="form-group mt-10">
                                            <label for="inputUsername">{{trans('home.phone')}}</label>
                                            <input type="text" class="form-control form-control-lg" id="inputUsername" name="phone" placeholder="Телефон" value="{{Auth::user()->phone}}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="text-center mt-10">
                                            <img src="{{asset('/storage/' . Auth::user()->avatar)}}" class="rounded-circle img-responsive mt-2" width="128" height="128">
                                            <label class="input-file mt-10">
                                                <input type="file" name="avatar">		
                                                <span class="col-lg-12">{{trans('home.choosephoto')}}</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary mt-20">{{trans('home.save')}}</button>
                            </form>
                        </div>
                    
                        <div class="card-body">
                            <form>
                                <div class="form-group">
                                    <h4>{{trans('home.balance')}}</h3>
                                    <span class="fw-bold">{{ Auth::user()->wallet->amount }}</span>
                                </div>
                                <div class="form-group mt-20">
                                    <h4>{{trans('home.boughtpackages')}}</h4>

                                    @if(count(Auth::user()->pockets) > 0)
                                        @foreach(Auth::user()->pockets as $key => $pocket)
                                            <p class="fw-bold">{{$key + 1}}: {{$pocket->title}}</p>
                                        @endforeach
                                    @else
                                        <p>{{trans('home.nopackages')}}</p>
                                    @endif
                                </div>
                                <div class="form-group mt-20">
                                    <h4>{{trans('home.invitelink')}}</h4>
                                    <a href="https://big-star.kz/register?invite_code={{Auth::user()->invite_code}}">https://big-star.kz/register?invite_code={{Auth::user()->invite_code}}</a>
                                </div>
                                <div class="form-group mt-20">
                                    <h4>{{trans('home.historyofinviment')}}</h4>

                                    @if(count($usersList) > 0)
                                        <?php $count = count($usersList); ?>
                                        @foreach($usersList as $key => $user)
                                            <?php $count--; ?>
                                            <span class="fw-bold"> {{$user->name}} @if($count != 0) ---> @else  @endif </span>
                                        @endforeach
                                    @else
                                        <p>{{trans('home.noinvite')}}</p>
                                    @endif
                                </div>
                            </form>

                        </div>
                    </div>

                </div>
{{--                PASSWORD--}}
                <div class="tab-pane fade" id="password" role="tabpanel">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">{{trans('home.changepassword')}}</h5>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{route('profile.updatePassword')}}">
                                @csrf
                                <div class="form-group mt-10">
                                    <label for="inputPasswordCurrent">{{trans('home.cureentpassword')}}</label>
                                    <input type="password" class="form-control" id="inputPasswordCurrent" name="currentPassword">
                                </div>
                                <div class="form-group mt-10">
                                    <label for="inputPasswordNew">{{trans('home.newpassword')}}</label>
                                    <input type="password" class="form-control" id="inputPasswordNew" name="password">
                                </div>
                                <div class="form-group mt-10">
                                    <label for="inputPasswordNew2">{{trans('home.repassword')}}</label>
                                    <input type="password" class="form-control" id="inputPasswordNew2" name="password_confirmation">
                                </div>
                                <button type="submit" class="btn btn-primary mt-20">{{trans('home.saves')}}</button>
                            </form>

                        </div>
                    </div>
                </div>

{{--                TRANSACTION--}}
                <div class="tab-pane fade" id="transaction" role="tabpanel">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">{{trans('home.transactions')}}</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <tbody><tr>
                                        <th>{{trans('home.typetransactions')}}</th>
                                        <th>{{trans('home.amount')}}</th>
                                        <th>{{trans('home.date')}}</th>
                                        <th>{{trans('home.status')}}</th>
                                    </tr>
                                    @if(count(Auth::user()->transactions) > 0)
                                        @foreach(Auth::user()->transactions as $transaction)
                                            <tr>
                                                <td>{{$transaction->description ?? $transaction->type}}</td>
                                                @if($transaction->type == 'Вывод')
                                                    <td class="align-middle" style="color: red">
                                                        - {{$transaction->sum}}
                                                    </td>
                                                @else
                                                    <td class="align-middle" style="color: green">
                                                        {{$transaction->sum}}
                                                    </td>
                                                @endif

                                                <td>{{$transaction->created_at}}</td>
                                                <td>{{$transaction->status}}</td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <p>{{trans('home.notransactions')}}</p>
                                    @endif
                                    </tbody></table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="withdraw" role="tabpanel">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">{{trans('home.withdraw')}}</h5>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{route('user.createWithdraw')}}">
                                @csrf
                                <div class="form-group">
                                    <input type="radio" id="fiz" name="organization_type" value="1">
                                    <label for="fiz">{{trans('home.fiz')}}</label>
                                    <input type="radio" id="ur" name="organization_type" value="2" class="ml-10">
                                    <label for="ur">{{trans('home.ur')}}</label>
                                </div>
                                <div class="form-group mt-10">
                                    <label for="inputPasswordCurrent">{{trans('home.cardnumber')}}</label>
                                    <input type="text" class="form-control" id="inputPasswordCurrent" name="card_no">
                                </div>
                                <div class="form-group mt-10">
                                    <label for="inputPasswordCurrent">{{trans('home.namebank')}}</label>
                                    <input type="text" class="form-control" id="inputPasswordCurrent" name="bank_title">
                                </div>
                                <div class="form-group mt-10">
                                    <label for="inputPasswordCurrent">{{trans('home.phone')}}</label>
                                    <input type="text" class="form-control" id="inputPasswordCurrent" name="phone">
                                </div>
                                <div class="form-group mt-10">
                                    <label for="inputPasswordCurrent">{{trans('home.summa')}}</label>
                                    <input type="text" class="form-control" id="inputPasswordCurrent" name="amount">
                                </div>
                                <div class="form-group mt-10">
                                    <label for="inputPasswordCurrent">{{trans('home.country')}}</label>
                                    <input type="text" class="form-control" id="inputPasswordCurrent" name="country">
                                </div>
                                <div class="form-group mt-10">
                                    <label for="inputPasswordCurrent">{{trans('home.city')}}</label>
                                    <input type="text" class="form-control" id="inputPasswordCurrent" name="city">
                                </div>
                                <button type="submit" class="btn btn-primary mt-20">{{trans('home.createapplication')}}</button>
                            </form>

                        </div>
                    </div>
                    <div class="card mt-5">
                        <div class="card-body">
                            <h5 class="card-title">{{trans('home.requested')}}</h5>
                            <div>
                                @if(count($withdraw) > 0)
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <tbody><tr>
                                                <th>Сумма</th>
                                                <th>Дата</th>
                                                <th>Статус</th>
                                            </tr>
                                            @foreach($withdraw as $withdrawRequest)
                                                <tr>
                                                    <td>{{$withdrawRequest->amount}}</td>
                                                    <td>{{$withdrawRequest->created_at}}</td>
                                                    <td>{{ \App\WithdrawRequest::getStatusAsText($withdrawRequest->status)}}</td>
                                                </tr>
                                            @endforeach
                                            </tbody></table>
                                    </div>
                                @else
                                    {{trans('home.norequested')}}
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('.list-group-item').on('click', function(e) {
            e.preventDefault(); // Prevent the default link behavior
            $('.list-group-item').removeClass('active');
            $(this).addClass('active');
            var target = $(this).attr('href'); // Get the target tab content
            $('.tab-pane').removeClass('show active');
            $(target).addClass('show active');
        });
    });

    $('.input-file input[type=file]').on('change', function(){
        let file = this.files[0];
        $(this).next().html(file.name);
    });
</script>

@endsection
