@extends('admin.layout')
@section('title')
    @lang('headers.admin_title')
@endsection
{{-- admin.errors included in admin.layout --}}
@section('content')
    {{$user->name}}
    {{ Form::open(['route'=>['profile.update',$user->id], 'method'=>'put']) }}
    <div class="card-body">

        <div class="form-group row">
            <label class="col-sm-3 text-right control-label col-form-label">
                Имя:
            </label>
            <div class="col-sm-9">
                <input type="text" class="form-control" value="{{$user->name}}"  name="name">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-3 text-right control-label col-form-label">
                E-mail
            </label>
            <div class="col-sm-9">
                <input type="text" class="form-control" value="{{$user->email}}"  name="email">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-3 text-right control-label col-form-label">
                Город
            </label>
            <div class="col-sm-9">
                <input type="text" class="form-control" value="{{$user->city}}"  name="city">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-3 text-right control-label col-form-label">
                Телефон
            </label>
            <div class="col-sm-9">
                <input type="text" class="form-control" value="{{$user->phone}}"  name="phone">
            </div>
        </div>
        <div>
            <a class="btn btn-info" href="{{ route('profile.index') }}">@lang('messages.back')</a>
            <button class="btn btn-success pull-right">
                @lang('messages.change')
            </button>
        </div>

    </div>
    {!! Form::close() !!}

    <!-- BEGIN MODAL -->

    <!-- Modal Add Category -->

    <!-- END MODAL -->
@endsection
<!-- ============================================================== -->
<!-- End PAge Content -->
<!-- ============================================================== -->