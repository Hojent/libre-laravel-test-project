@extends('admin.layout')
@section('title')
    Рабочий стол
@endsection
<!-- ============================================================== -->
<!-- Start Page Content -->
<!-- ============================================================== -->
@section('content')

<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Последние действия (update)</h4>
            </div>
            <div class="comment-widgets scrollable">
                <!-- Comment Row -->
                @foreach ($lastcars as $lastcar)
                <div class="d-flex flex-row comment-row m-t-0">
                    <div class="p-2"><img src="{{$lastcar->getImage()}}" alt="" width="50" class="rounded-circle"></div>
                    <div class="comment-text w-100">
                        <h6 class="font-medium">{{$lastcar->title}}</h6>
                        <span class="m-b-15 d-block"><b>{{$lastcar->author->name}}</b><br>


                        <div class="comment-footer">
                            <span class="text-muted float-right">{{$lastcar->updated_at}}</span>
                            <div class="row">
                                <div class="col-sm-4">
                                    <a href="{{route('books.edit',$lastcar->id)}}" class="m-b-0 font-medium p-0"
                                       title="edit">
                                        <button type="button" class="btn btn-cyan btn-sm">Редактировать</button>
                                    </a>
                                </div>
                                <div class="col-sm-8">
                                    {{Form::open([
                                   'route'=>['books.destroy',
                                       $lastcar->id],
                                    'method'=>'delete'
                                    ])}}
                                    <button type="submit" onclick="return confirm('удалить?')" class="btn btn-danger btn-sm">Удалить</button>
                                    {{Form::close()}}
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <!-- Card -->
    </div>
</div>

<!-- BEGIN MODAL -->

<!-- Modal Add Category -->

<!-- END MODAL -->
@endsection
<!-- ============================================================== -->
<!-- End PAge Content -->
<!-- ============================================================== -->