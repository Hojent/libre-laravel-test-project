@extends('layout')

@section('content')

        <div class="container">
            <div class="row">
                <div class="col-md-9 pb-5">
                    <p class="breadcrumbs"><span class="mr-2"><a href="/">Главная <i class="ion-ios-arrow-forward"></i></a></span> <span>Книги <i class="ion-ios-arrow-forward"></i></span></p>
                    <h1 class="mb-3 bread">
                        Книги на полке
                    </h1>
                </div>
            </div>
        </div>
    <section class="section">
        <div class="container">
            <div class="row ">
                @foreach($books as $book)
                    <div class="col-md-6">
                        <div class=" float-left m-2 mr-3">
                            <div class="img " >
                                <img src="{{$book->getImage()}}">
                            </div>
                        </div>
                        <div class="text ">
                            <p><a href="#">{{$book->author['name']}}</a></p>
                            <h4><a href="#">{{$book->title}}</a></h4>
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