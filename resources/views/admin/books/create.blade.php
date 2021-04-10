@extends('admin.layout')
@section('title')
    @lang('headers.add_boo')
@endsection
@section('content')
    {{ Form::open([
        'route' => 'books.store',
        'file' => 'true',
        'enctype' => 'multipart/form-data'
        ]) }}
    <div class="card-body">
        <div class="form-group row">
            <div class="col-sm-2">
            <label for="title" class="col-sm-3 text-right control-label col-form-label">
                @lang('messages.title')
            </label>
            </div>
            <div class="col-sm-10">
                <input type="text" class="form-control form-group" id="title" placeholder="введите заголовок" name="title" value="{{old('title')}}">
                <textarea cols="30" rows="10" class="form-control form-group" id="content" placeholder="содержание" name="description">{{old('description')}}</textarea>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-2">
                <label for="category_id" class="col-sm-3 text-right control-label col-form-label">
                    @lang('headers.author')
                </label>
            </div>
            <div class="col-sm-10">
                {{Form::select('author_id',
                    $authors, null,
                    ['placeholder' => 'Выберите автора',
                    'class' => 'select2 form-control custom-select',
                    'style' => 'width: 100%; height:36px;']
                    )
                }}
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-2">
                <label for="picture" class="col-sm-3 text-right control-label col-form-label">
                    @lang('messages.picture')
                </label>
            </div>
            <div class="col-sm-10">
                    <input type="file" name="image" class="form-control" id="image" value="{{old('image')}}">
            </div>
        </div>

        <div>
            <a class="btn btn-info" href="{{ route('books.index') }}">@lang('messages.back')</a>
            <button class="btn btn-success pull-right">
                @lang('messages.save')
            </button>
        </div>

    </div>
    {!! Form::close() !!}

    <!-- BEGIN MODAL -->

    <!-- Modal Add Category -->

    <!-- END MODAL -->
@endsection
@section('script')
    @parent
    <script>
        $(".select2").select2();
    </script>
@endsection
<!-- ============================================================== -->
<!-- End PAge Content -->
<!-- ============================================================== -->