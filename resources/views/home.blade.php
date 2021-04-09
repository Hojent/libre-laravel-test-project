@extends('layout')

@section('content')


        <div class="container">
            <div class="row justify-content-start align-items-center">
                <div class="col-lg-6 col-md-6 d-flex align-items-end">
                    <div class="text">
                        <h1 class="mb-4">Книжая <span>полка</span></h1>
                        <p style="font-size: 18px;">Классики и современные писатели в библиотеке для скачивания.</p>

                    </div>
                </div>
            </div>
        </div>

    <section class="ftco-section">
        <div class="container-fluid px-4">
            <div class="row justify-content-center">
                <div class="col-md-12 heading-section text-center mb-5">
                    <h2 class="mb-2">Новинки</h2>
                </div>
            </div>
            <div class="row flex-row">
               @foreach($books as $book)
                <div class="flex-wrap col-md-3">
                    <div class="car-wrap ftco-animate">
                        <div class="img d-flex align-items-end"
                             style="background-image: url({{$book->getImage()}});"
                        >

                        </div>
                        <div class="text p-4 text-center">
                            <h2 class="mb-0"><a href="#">Автор: {{$author->name}}</a></h2>
                            <span>{{$book->title}}</span>
                            <p class="d-flex mb-0 d-block">
                              {{-- <a href="{{route('car', $car->id)}}" class="btn btn-black btn-outline-black ml-1">--}}
                                   См.книгу
                               {{--</a>--}}
                            </p>
                        </div>
                    </div>
                </div>
               @endforeach
            </div>
        </div>
    </section>



@endsection
@section ('script')

@endsection