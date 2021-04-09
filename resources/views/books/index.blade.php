@extends('layout')

@section('content')
    <div class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('/images/bg_2.jpg');" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
                <div class="col-md-9 ftco-animate pb-5">
                    <p class="breadcrumbs"><span class="mr-2"><a href="/">Главная <i class="ion-ios-arrow-forward"></i></a></span> <span>Блог <i class="ion-ios-arrow-forward"></i></span></p>
                    <h1 class="mb-3 bread">
                        {{$categoryTitle ?? ''}}
                        {{$tagTitle ?? ''}}
                    </h1>
                </div>
            </div>
        </div>
    </div>
    <section class="ftco-section">
        <div class="container">
            <div class="row d-flex justify-content-center">
                @foreach($posts as $post)
                <div class="col-md-10 text-center d-flex ftco-animate">
                    <div class="blog-entry justify-content-end">
                        <a href="{{route('article', $post->slug)}}" class="block-20 img" style="background-image: url('{{$post->getImage()}}');">
                        </a>
                        <div class="text pt-4">
                            <div class="meta mb-3">
                                <div>{{$post->getDate()}}</div>
                            </div>
                            <h3 class="heading mt-2"><a href="{{route('article', $post->slug)}}">{{$post->title}}</a></h3>
                            <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
                            <p><a href="{{route('article', $post->slug)}}" class="btn-custom">Continue <span class="icon-long-arrow-right"></span></a></p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="row mt-5">
                <div class="col text-center">
                    <div class="block-27">
                        {{$posts->links()}}
                    </div>
                </div>
        </div>
    </section>

@endsection