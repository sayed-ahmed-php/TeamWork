<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="description" content="Create team site that healp peaople to find ,create quikly great team">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="HTML,CSS,JQUERY,bootstrap">

    <title>Log In</title>
	<l<link rel="shortcut icon" href="{{URL::asset('src/images/logo.png')}}"/>

    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
    <link href="{{URL::asset('src/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('src/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('src/css/log-in.css')}}" rel="stylesheet">
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
</head>
<body>
<div class="logIn">
    <div class="log-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-sm-offset-4 col-sm-5 col-xs-12">
                    <h3 class="text-center">Log In</h3>
                    <form class="form-group" method="post" action="/login">
                        <i class="icon-user"></i>
                        <input type="Email" class="form-control mail" name="email" placeholder="E-Mail or Username" required>
                        <i class="icon-lock"></i>
                        <input type="password" class="form-control password" name="password" placeholder="Password" required>
                        <input type="submit" class="form-control login-btn" value="Log in">
                        <hr>
                        {{csrf_field()}}
                    </form>
                    <form class="form-group"><input type="submit" id="register" class="form-control" formaction="/register" value="Register"></form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{URL::asset('src/js/jquery-3.1.1.min.js')}}"></script>
<script src="{{URL::asset('src/js/bootstrap.min.js')}}"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script>
    @if(Session::has('message'))
        var type="{{Session::get('alert-type','info')}}"

        switch(type){
            case 'success':
                toastr.success("{{ Session::get('message') }}");
                break;
            case 'error':
                toastr.error("{{ Session::get('message') }}");
                break;
        }
    @endif
</script>

</body>
</html>