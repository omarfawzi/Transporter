<!DOCTYPE html>

<html lang="{{ app()->getLocale() }}">



<head>

    <meta charset="utf-8" />

    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('adminPanel/img/apple-icon.png')}}">

    <link rel="icon" type="image/png" sizes="96x96" href="{{asset('adminPanel/img/favicon.png')}}">

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Admin</title>

    <meta name="csrf-token" content="{!! csrf_token() !!}">

    <style>

        .container{

            position: absolute;

            top: 46%;

            left: 50%;

            transform: translate(-50%, -50%);

            width: 100%;

        }

    </style>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />

    <meta name="viewport" content="width=device-width" />





    <!-- Bootstrap core CSS     -->

    <link href="{{asset('adminPanel/css/bootstrap.min.css')}}"  rel="stylesheet"/>



    <!-- Animation library for notifications   -->

    <link href="{{asset('adminPanel/css/animate.min.css')}}"  rel="stylesheet"/>



    <!--  Paper Dashboard core CSS    -->

    <link href="{{asset('adminPanel/css/paper-dashboard.css')}}"  rel="stylesheet"/>


    <link href="{{asset('adminPanel/css/font-awesome.min.css')}}"  rel="stylesheet"/>

    <!--  Fonts and icons     -->

    <link href="{{asset('adminPanel/css/themify-icons.css')}}" rel="stylesheet">

</head>

<body>

    <div id="app">

    </div>
</body>

<script src="{{asset('adminPanel/js/jquery-1.10.2.js')}}" type="text/javascript"></script>

<script src="{{asset('adminPanel/js/bootstrap.min.js')}}" type="text/javascript"></script>

<script src="{{asset('adminPanel/js/bootstrap-notify.js')}}"></script>

<!-- Paper Dashboard Core javascript and methods for Demo purpose -->

<script src="{{asset('adminPanel/js/paper-dashboard.js')}}"></script>

<script src="{{asset('adminPanel/js/demo.js')}}"></script>

<script src="{{asset('adminPanel/js/jquery-show-first.js')}}"></script>


<!--  Charts Plugin -->

<script src="{{asset('adminPanel/js/chartist.min.js')}}"></script>



<!--  Notifications Plugin    -->

<script src="{{asset('js/app.js')}}"></script>
<!--  Google Maps Plugin    -->






</html>

