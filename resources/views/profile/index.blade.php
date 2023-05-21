
@extends('layouts.app')

@section('content')

<div class="container p-0">
    <h1 class="h3 mb-3">{{Auth::user()->name}}</h1>
    <div class="row">
        <div class="col-md-5 col-xl-4">

            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Настройки</h5>
                </div>

                <div class="list-group list-group-flush" role="tablist">
                    <a class="list-group-item list-group-item-action active" data-toggle="list" href="#account" role="tab">
                        Профиль
                    </a>
                    <a class="list-group-item list-group-item-action" data-toggle="list" href="#password" role="tab">
                        Сменить пароль
                    </a>
                    <a class="list-group-item list-group-item-action" data-toggle="list" href="#transaction" role="tab">
                        Транзакции
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-7 col-xl-8">
            <div class="tab-content">
                <div class="tab-pane fade show active" id="account" role="tabpanel">

                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Профиль</h5>
                        </div>
                        <div class="card-body">
                            <form>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="inputUsername">ФИО</label>
                                            <input type="text" class="form-control" id="inputUsername" placeholder="ФИО" value="{{Auth::user()->name}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="inputUsername">E-mail</label>
                                            <input type="text" class="form-control" id="inputUsername" placeholder="E-mail" value="{{Auth::user()->email}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="inputUsername">Телефон</label>
                                            <input type="text" class="form-control" id="inputUsername" placeholder="Телефон" value="{{Auth::user()->phone}}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="text-center">
                                            <img alt="Andrew Jones" src="https://bootdey.com/img/Content/avatar/avatar1.png" class="rounded-circle img-responsive mt-2" width="128" height="128">
                                            <input type="file">
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary">Сохранить изменения</button>
                            </form>

                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Приватная информация</h5>
                        </div>
                        <div class="card-body">
                            <form>
                                <div class="form-group">
                                    <label for="inputEmail4">Ссылка для приглашения</label>
                                    <input type="email" class="form-control" id="inputEmail4" placeholder="Ссылка для приглашения" value="https://big-star.kz/register?invite_code={{Auth::user()->invite_code}}">
                                    <small>Скопируйте и отправте друзьям!</small>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail4">Ваш баланс</label>
                                    <input type="email" class="form-control" id="inputEmail4" placeholder="Баланс" value="{{Auth::user()->wallet->amount}}" readonly>
                                </div>
                            </form>

                        </div>
                    </div>

                </div>
{{--                PASSWORD--}}
                <div class="tab-pane fade" id="password" role="tabpanel">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Смена пароля</h5>

                            <form>
                                <div class="form-group">
                                    <label for="inputPasswordCurrent">Текущий пароль</label>
                                    <input type="password" class="form-control" id="inputPasswordCurrent">
                                </div>
                                <div class="form-group">
                                    <label for="inputPasswordNew">Новый пароль</label>
                                    <input type="password" class="form-control" id="inputPasswordNew">
                                </div>
                                <div class="form-group">
                                    <label for="inputPasswordNew2">Подтвердите новый пароль</label>
                                    <input type="password" class="form-control" id="inputPasswordNew2">
                                </div>
                                <button type="submit" class="btn btn-primary">Сохранить</button>
                            </form>

                        </div>
                    </div>
                </div>

{{--                TRANSACTION--}}
                <div class="tab-pane fade" id="transaction" role="tabpanel">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Транзикции</h5>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <tbody><tr>
                                        <th>Тип транзакции</th>
                                        <th>Стоимость</th>
                                        <th>Дата</th>
                                        <th>Статус</th>
                                    </tr>
                                    <tr>
                                        <td>Покупка пакета</td>
                                        <td class="align-middle">
                                            2000
                                        </td>
                                        <td>2018-01-20</td>
                                        <td>Куплен</td>
                                    </tr>
                                    <tr>
                                        <td>Покупка пакета</td>
                                        <td class="align-middle">
                                            2000
                                        </td>
                                        <td>2018-01-20</td>
                                        <td>Куплен</td>
                                    </tr>
                                    <tr>
                                        <td>Поступление от приглашенного друга</td>
                                        <td class="align-middle">
                                            250
                                        </td>
                                        <td>2018-01-20</td>
                                        <td>-</td>
                                    </tr>
                                    <tr>
                                        <td>Вывод</td>
                                        <td class="align-middle">
                                            2000
                                        </td>
                                        <td>2018-01-20</td>
                                        <td>Выведен</td>
                                    </tr>
                                    </tbody></table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection
