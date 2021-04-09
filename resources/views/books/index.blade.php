@extends('layout')

@section('content')

        <div class="container">
            <div class="row">
                <div class="col-md-9 ftco-animate pb-5">
                    <p class="breadcrumbs"><span class="mr-2"><a href="/">Главная <i class="ion-ios-arrow-forward"></i></a></span> <span>Блог <i class="ion-ios-arrow-forward"></i></span></p>
                    <h1 class="mb-3 bread">
                        Книги на полке
                    </h1>
                </div>
            </div>
        </div>
    <section class="ftco-section">
        <div class="container">
            <div class="row d-flex justify-content-center">
                @foreach($books as $book)
                <div class="col-md-10 text-center d-flex ftco-animate">
                    <div class="blog-entry justify-content-end">
                        <a href="{{route('books', $book->id)}}" class="block-20 img"
                           style="background-image: url('{{$book->getImage()}}');">
                        </a>
                        <div class="text pt-4">
                            <div class="meta mb-3">
                                <div>{{$book->author->name}}</div>
                            </div>
                            <p class="heading mt-2"><a href="{{route('books', $book->id)}}">{{$book->title}}</a></p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="row mt-5">
                <div class="col text-center">
                    <div class="block-27">
                        Загрузить еще
                    </div>
                </div>
        </div>
    </section>

@endsection