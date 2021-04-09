@extends('admin.layout')
@section('title')
    @lang('headers.add_post')
@endsection
@section('content')
    {{ Form::open([
        'route' => 'posts.store',
        'file' => 'true',
        'enctype' => 'multipart/form-data'
        ]) }}
    <div class="card-body">
        <!--------- checkboxes -->
        <div class="row">
            <div class="form-group row col-sm-4">
                <label class="col-md-5">@lang('messages.featured')</label>
                <div class="col-md-7">
                    <div class="custom-control custom-checkbox mr-sm-2">
                        {{Form::checkbox('is_featured', '1', old('is_featured'), [
                        'class'=>'custom-control-input',
                        'id' => 'customControlAutosizing1',
                        ])}}
                        <label class="custom-control-label" for="customControlAutosizing1">
                            @lang('messages.yes')
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group row col-sm-8">
                <label class="col-md-2">@lang('messages.status')</label>
                <div class="col-md-10">
                    <div class="custom-control custom-checkbox mr-sm-2">
                        {{Form::checkbox('status', '1', old('status'), [
                       'class'=>'custom-control-input',
                       'id' => 'customControlAutosizing2',
                       ])}}
                        <label class="custom-control-label" for="customControlAutosizing2">
                            @lang('messages.public')
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <!--------- end checkboxes -->
        <div class="form-group row">
            <div class="col-sm-2">
            <label for="title" class="col-sm-3 text-right control-label col-form-label">
                @lang('messages.title')
            </label>
            </div>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="title" placeholder="введите заголовок" name="title" value="{{old('title')}}">
                <textarea cols="30" rows="10" class="form-control" id="content" placeholder="содержание" name="content">{{old('content')}}</textarea>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-2">
                <label for="category_id" class="col-sm-3 text-right control-label col-form-label">
                    @lang('messages.category')
                </label>
            </div>
            <div class="col-sm-10">
                {{Form::select('category_id',
                    $categories, null,
                    ['placeholder' => 'Выберите категорию',
                    'class' => 'select2 form-control custom-select',
                    'style' => 'width: 100%; height:36px;']
                    )
                }}
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-2">
                <label for="tags" class="col-sm-3 text-right control-label col-form-label">
                    @lang('messages.tags')
                </label>
            </div>
            <div class="col-sm-10">
                {{Form::select('tags[]',
                    $tags, null, [
                    'class' => 'select2 form-control m-t-15',
                    'style' => 'width: 100%; height:36px;',
                    'multiple' => 'multiple',
                    ])
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
                {{Form::file('image')}}
                {{--<input type="file" class="form-control" id="picture" placeholder="картинка" name="picture">--}}
            </div>
        </div>

        <div>
            <a class="btn btn-info" href="{{ route('posts.index') }}">@lang('messages.back')</a>
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
    <script>
        CKEDITOR.replace( 'content' );
    </script>
@endsection
<!-- ============================================================== -->
<!-- End PAge Content -->
<!-- ============================================================== -->