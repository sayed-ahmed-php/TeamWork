<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="description" content="Create team site that help people to find ,create great team">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="HTML,CSS,JQUERY,bootstrap">

    <title>@yield('title')</title>
	<l<link rel="shortcut icon" href="{{URL::asset('src/images/logo.png')}}"/>

    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
    <link href="{{URL::asset('src/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('src/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('src/css/style.css')}}" rel="stylesheet">
    <link href="{{URL::asset('src/css/user-profile.css')}}" rel="stylesheet">
</head>
<body>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="{{URL::asset('src/js/jquery-3.1.1.min.js')}}"></script>
<script src="{{URL::asset('src/js/bootstrap.min.js')}}"></script>
<script src="{{URL::asset('src/js/edit.js')}}"></script>

    @include('partials.header')

    @yield('content')

    @include('partials.footer')
</body>
</html>