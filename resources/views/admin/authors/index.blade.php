@extends('admin.layout')
@section('title')
   Авторы
@endsection
@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title m-b-0">
                        Авторы книг
                    </h4>
                </div>
                <ul class="list-style-none">
                    @foreach ($authors as $author)
                    <li class="d-flex no-block card-body border-top">
                        <i class="fa fa-check-circle w-30px m-t-5"></i>
                        <div>
                            <a href="{{route('authors.edit',$author->id)}}" class="m-b-0 font-medium p-0" title="@lang('headers.edit')">{{$author->name}}</a>
                        </div>
                        <div class="ml-auto">
                            {{Form::open(['route'=>['authors.destroy',  $author->id], 'method'=>'delete'])}}
                            <button title="@lang('messages.delete')" onclick="return confirm('удалить автора и все его книги?')" type="submit" class="icon-delete">
                                <i class="far fa-trash-alt"></i>
                            </button>
                            {{Form::close()}}
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="col-md-4">
            <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#modal-add">
                @lang('headers.add_author')
            </button>
            <div class="card-body">
                <div class="alert alert-info">Чтобы изменить имя автора, кликнете по нему</div>
            </div>
        </div>
    </div>


    <!-- BEGIN MODAL -->

    <!-- Modal Add Category -->
    @include('partials.new-author')
    <!-- END Add -->

    <!-- Modal Edit Category -->
    <!-- END Edit -->

    <!-- END MODAL -->
@endsection
<!-- ============================================================== -->
<!-- End PAge Content -->
<!-- ============================================================== -->