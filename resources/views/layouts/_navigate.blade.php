<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="/">Libre</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active"><a href="{{route('home')}}" class="nav-link">Главная</a></li>
            <li class="nav-item"><a href="{{route('books')}}" class="nav-link">Книги</a></li>
            <li class="nav-item"><a href="{{route('admin')}}" class="nav-link"><i class="fa-lock"></i>Вход</a></li>
        </ul>
    </div>
</nav>