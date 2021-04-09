@extends('admin.layout')
@section('title')
    @lang('headers.edit_category')
@endsection
{{-- admin.errors included in admin.layout --}}
@section('content')
    {{Form::open(['route'=>['categories.update',$category->id], 'method'=>'put'])}}
    <div class="card-body">

        <div class="form-group row">
            <label for="fname" class="col-sm-3 text-right control-label col-form-label">
                @lang('messages.name')
            </label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="fname" value="{{$category->title}}"  name="title">
            </div>
        </div>

        <div>
            <a class="btn btn-info" href="{{ route('categories.index') }}">@lang('messages.back')</a>
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