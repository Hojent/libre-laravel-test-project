<ul id="sidebarnav" class="p-t-30">
    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('admin')}}" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Рабочий стол</span></a></li>
    <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-blogger"></i><span class="hide-menu">Книжная полка</span></a>
        <ul aria-expanded="false" class="collapse  first-level">
            <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('books.index')}}" aria-expanded="false"><i class="mdi mdi-pencil"></i><span class="hide-menu">Книги</span></a></li>
            <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('authors.index')}}" aria-expanded="false"><i class="mdi mdi-chart-bubble"></i><span class="hide-menu">Авторы</span></a></li>
        </ul>
    </li>

</ul>