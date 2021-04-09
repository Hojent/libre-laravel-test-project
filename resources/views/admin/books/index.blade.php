@extends('admin.layout')
@section('title')
    {{ __('headers.admin_posts') }}
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title m-b-0">
                        @lang('headers.index_posts'):
                        @if ($cid)
                        {{$categoryTitle}}
                        @endif
                    </h4>
                    <div class="table-responsive">
                        <div class="row">
                            <table id="zero_config" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>Заголовок</th>
                                    <th>Категория</th>
                                    <th>Картинка</th>
                                    <th>Дата</th>
                                    <th title="Статус документа">S</th>
                                    <th title="Действие">A</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($posts as $post)
                                    <tr>
                                        <td>
                                            <a href="{{route('posts.edit',$post->id)}}" class="m-b-0 font-medium p-0" title="@lang('headers.edit_post')">{{$post->title}}</a><br>
                                            @lang('messages.tags'): <span class="small">{{$post->getTags()}}</span>
                                        </td>
                                        <td>{{$post->getCategory()}}</td>
                                        <td><img width="200px" src="{{$post->getImage()}}"></td>
                                        <td>{{$post->created_at}}</td>
                                        <td>
                                        @if ($post->isStatus($post->status))
                                                <i class="mdi mdi-eye float-left" title="опубликовано"></i>
                                            @else
                                                <i class="mdi mdi-eye-off" title="скрыто"></i>
                                        @endif
                                        @if ($post->isStatus($post->is_featured))
                                                <i class="mdi mdi-star-circle" title="в избранном"></i>
                                            @endif
                                        </td>
                                        <td>
                                            {{Form::open([
                                            'route'=>['posts.destroy', $post->id],
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
                    <div>
                           <a href="{{route('posts.create')}}" class="btn btn-sm btn-info")>
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