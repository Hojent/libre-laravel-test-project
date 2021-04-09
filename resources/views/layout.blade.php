<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Книжная полка</title>
    <script src="{{asset('/js/jquery-v3.min.js')}}"></script>
<script src="{{asset('/js/jquery-migrate-3.0.1.min.js')}}"></script>
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans:wght@200;300;400;500;600;800&display=swap" rel="stylesheet">
    <link href="{{asset('/css/front.css')}}" rel="stylesheet">
</head>
<body>

    @include('layouts._navigate')

<!-- END nav -->
@yield('content')
<footer>
    @include('layouts._footer')
</footer>

<!-- end modal -->
<!-- loader -->

<script src="{{asset('/js/app.js')}}"></script>
{{--<script src="{{'/js/popper.min.js'}}"></script>
<script src="{{'/js/bootstrap.min.js'}}"></script>
<script src="{{'/js/jquery.easing.1.3.js'}}"></script>
<script src="{{'/js/jquery.waypoints.min.js'}}"></script>
<script src="{{'/js/jquery.stellar.min.js'}}"></script>
<script src="{{'/js/owl.carousel.min.js'}}"></script>
<script src="{{'/js/jquery.magnific-popup.min.js'}}"></script>
<script src="{{'/js/aos.js'}}"></script>
<script src="{{'/js/jquery.animateNumber.min.js'}}"></script>
<script src="{{'/js/bootstrap-datepicker.js'}}"></script>
<script src="{{'/js/jquery.timepicker.min.js'}}"></script>
<script src="{{'/js/scrollax.min.js'}}"></script>
<script src="{{'/js/main.js'}}"></script>--}}
<!--<script src="https://maps.googleapis.com/maps/api/js?key=need-to-be-get&sensor=false"></script>-->
@yield('script')
<!-- loader -->
</body>
</html>