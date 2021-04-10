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
            <div class="row book-list">
                @if(count($books)>0)
                @foreach($books as $book)
                    <div class="col-md-6 book-box">
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
                    @endif
            </div>
            <div class="row mt-5">
                <div class="col text-center">
                    @if(count($books)>0)
                        <p class="text-center mt-4 mb-5"><button class="load-more btn btn-dark" data-totalResult="{{ \App\Book::count() }}">Загрузить еще</button></p>
                    @endif
                </div>
            </div>
        </div>

    </section>
        {{-- Ajax Script Start --}}
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script type="text/javascript">
            var main_site="{{ url('/') }}";
        </script>
        <script type="text/javascript">
            $(document).ready(function(){
                $(".load-more").on('click',function(){
                    var _totalCurrentResult=$(".book-box").length;
                    // Ajax Reuqest
                    $.ajax({
                        url:main_site+'/load-more-data',
                        type:'get',
                        dataType:'json',
                        data:{
                            skip:_totalCurrentResult
                        },
                        beforeSend:function(){
                            $(".load-more").html('Loading...');
                        },
                        success:function(response){
                            var _html=''; console.log('000000000');
                            var image='uploads/';
                            $.each(response,function(index,value){
                                _html+='<div class="col-md-6 book-box">';
                                _html+='<div class=" float-left m-2 mr-3">';
                                _html+='<div class="img"><img src="'+image+value.image+'"/></div>';
                                _html+='</div>';
                                _html+='<div class="text">';
                                _html+='<p><a href="#">'+value.author_id+'</a></p>';
                                _html+='<h4>'+value.title+'</h4>';
                                _html+='</div>';
                                _html+='</div>';
                              });
                            console.log(_html);
                            $(".book-list").append(_html);
                            // Change Load More When No Further result
                            var _totalCurrentResult=$(".book-box").length;
                            var _totalResult=parseInt($(".load-more").attr('data-totalResult'));
                            console.log(_totalCurrentResult);
                            console.log(_totalResult);
                            if(_totalCurrentResult==_totalResult){
                                $(".load-more").remove();
                            }else{
                                $(".load-more").html('Загрузить еще');
                            }
                        }
                    });
                });
            });
        </script>
        {{-- Ajax Script End --}}
@endsection