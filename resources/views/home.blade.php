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

    <section class="section">
        <div class="container-fluid px-4">
            <div class="row justify-content-center">
                <div class="col-md-12 heading-section text-center mb-5">
                    <h2 class="mb-2">Новинки</h2>
                </div>
            </div>
            <div class="row flex-row">
               @foreach($books as $book)
                   <div class="col-md-4">
                        <div class=" float-left m-2 mr-3">
                                <div class="img " >
                                    <img src="{{$book->getImage()}}">
                                </div>
                        </div>
                         <div class="text ">
                            <p>{{$book->author['name']}}</p>
                             <h4><a href="{{route('book', $book->id)}}">{{$book->title}}</a></h4>
                        </div>

                    </div>
               @endforeach
            </div>
        </div>
    </section>



@endsection
@section ('script')

@endsection