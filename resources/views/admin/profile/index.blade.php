@extends('admin.layout')
@section('title')
    @lang('headers.admin_title')
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="col-md-12 order-md-last ftco-animate">
                        <h2 class="mb-3">{{$user->name}}</h2>
                        <div class="row">
                            <div class="col-5">
                                <img class="img-fluid" src="{{$user->getImage()}}"/>
                            </div>
                            <div class="col-7">
                                <div>E-mail: {{$user->email}}</div>
                                <div>Город: {{$user->city}}</div>
                                <div>Телефон: {{$user->phone}}</div>

                                <div class="box"><h5><a href="{{route('password.request')}}">Запрос сброса пароля</a></h5></div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection