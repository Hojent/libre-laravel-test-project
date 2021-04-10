@extends('admin.layout')
@section('title')
    @lang('headers.edit_book')
@endsection
@section('content')

    {{ Form::open([
     'route' => ['books.update', $book->id],
     'file' => 'true',
     'enctype' => 'multipart/form-data',
     'method' => 'put',
     ]) }}
    <div class="card-body">
        <div class="form-group row">
            <div class="col-sm-2">
                <label for="title" class="col-sm-3 text-right control-label col-form-label">
                    @lang('messages.title')
                </label>
            </div>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="title" placeholder="введите заголовок" name="title" value="{{$book->title}}">
                <textarea cols="30" rows="10" class="form-control" id="content" placeholder="содержание" name="content">{{$book->descriptio}}</textarea>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-2">
                <label for="author_id" class="col-sm-3 text-right control-label col-form-label">
                    @lang('headers.author')
                </label>
            </div>
            <div class="col-sm-10">
                {{Form::select('author_id',
                  $authors,
                  $author,
                  ['class' => 'select2 form-control custom-select',
                  'style' => 'width: 100%; height:36px;',
                  ])
                }}
            </div>
        </div>
        <div class="form-group row">


        </div>

        <div class="form-group row">
            <div class="col-sm-2">
                <label for="picture" class="col-sm-3 text-right control-label col-form-label">
                    @lang('messages.picture')
                </label>
            </div>
            <div class="col-sm-10">
                <div class="box">
                    <label for="image">Обложка</label>
                    <input type="file" name="image" class="form-control" id="image" value="{{$book->image}}">
                    <img class="img-thumbnail" src="{{$book->getImage()}}" />
                </div>
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
    <
    <script>
        $(".select2").select2();
    </script>
    <script>
        CKEDITOR.replace( 'content' );
    </script>
@endsection
<!-- ============================================================== -->
<!-- End PAge Content -->
<!-- ============================================================== -->