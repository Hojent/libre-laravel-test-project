@extends('layout')

@section('content')
    <section>
        <div class="container">
            <div class="row align-items-end justify-content-start">
                <div class="col-md-9 ftco-animate pb-5">
                    <p class="breadcrumbs"><span class="mr-2"><a href="{{route('home')}}">Главная <i class="ion-ios-arrow-forward"></i></a></span> <span class="mr-2"><a href="{{route('books')}}"><i class="ion-ios-arrow-forward"></i>Книги</a></span></p>
                    <h1 class="mb-3 bread">{{$book->title}}</h1>
                </div>
            </div>
        </div>
    </section>

    <section >
        <div class="container">
            <div class="row">
                <div class="col-md-4 ">
                    <h2>{{$book->title}}</h2>
                    <div class="float-left m-3">
                        <img width="100%" src="{{$book->getImage()}}"/>
                        <p>{{$book->author['name']}}</p>
                    </div>
                 </div> <!-- .col-md-8 -->
                <div class="col-md-8 ">
                    {!! $book->description !!}
                </div>
            </div>
        </div>
    </section> <!-- .section -->

@endsection