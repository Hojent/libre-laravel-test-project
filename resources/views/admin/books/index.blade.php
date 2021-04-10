@extends('admin.layout')
@section('title')
    {{ __('headers.books') }}
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title m-b-0">
                        @lang('headers.books_list'):

                    </h4>
                    <div class="table-responsive">
                        <div class="row">
                            <table  class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>Заголовок</th>
                                    <th>Автор</th>
                                    <th>Обложка</th>
                                    <th>Дата</th>
                                    <th title="Действие">A</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($books as $book)
                                    <tr>
                                        <td>
                                            <a href="{{route('books.edit',$book->id)}}" class="m-b-0 font-medium p-0" title="@lang('headers.edit')">{{$book->title}}</a>

                                        </td>
                                        <td>{{$book->author['name']}}</td>
                                        <td><img width="100px" src="{{$book->getImage()}}"></td>
                                        <td>{{$book->created_at}}</td>

                                        <td>
                                            {{Form::open([
                                            'route'=>['books.destroy', $book->id],
                                             'method'=>'delete'
                                             ])}}
                                            <button class="btn btn-link btn-sm"
                                                    title="@lang('messages.delete')"
                                                onclick="return confirm('удалить материал?')"
                                                    type="submit">
                                                <i class="mdi mdi-delete fa-2x "></i>
                                            </button>
                                            {{Form::close()}}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="m-3">
                           <a href="{{route('books.create')}}" class="btn btn-sm btn-info")>
                               @lang('messages.add')
                           </a>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
@section('script')
    @parent
    <
    <script>
       $('#zero_config').DataTable();
    </script>
@endsection
<!-- ============================================================== -->
<!-- End PAge Content -->
<!-- ============================================================== -->