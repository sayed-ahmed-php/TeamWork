<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">
                <img src="{{URL::asset('src/images/logo.png')}}" width="50px"  class="img-responsive" alt="logo">
            </a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            @if(Auth::guard('web') -> check())
                <ul class="nav navbar-nav navbar-left">
                    <li><a href="/user/room/room">Rooms</a></li>
                    <li><a href="/about-us">About</a></li>
                </ul>
            @elseif(Auth::guard('company') -> check())
                <ul class="nav navbar-nav navbar-left">
                    <li><a href="/about-us">About</a></li>
                </ul>
            @endif
            <form class="navbar-form navbar-left" action="/search">
                <div class="form-group">
                    <i class="search"></i>
                    <input type="text" class="form-control" placeholder="Search" name="search" required>
                </div>
            </form>
            <ul class="nav navbar-nav navbar-right">
                @if (Auth::guard('web') -> check())
                    <li class="dropdown">
                        <script type="@php($user = Auth::guard('web') -> user())"></script>
                        @if(empty($user['image']))
                            <img src="{{URL::asset('src/images/user.png')}}" width="30px" height="30px" class="img-responsive">
                        @else
                            <img src="{{URL::asset($user['image'])}}" width="30px" height="30px" class="img-responsive">
                        @endif
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            {{$user['fname'].' '.$user['lname']}} <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="/user/profile">Profile</a></li>
                            <li><a href="/user/setting">Setting</a></li>
                            <li><a href="/logout/{{'web'}}">Log Out</a></li>
                        </ul>
                    </li>
                @elseif(Auth::guard('company') -> check())
                    <li class="dropdown">
                        <script type="@php($com = Auth::guard('company') -> user())"></script>
                        @if(empty($com['image']))
                            <img src="{{URL::asset('src/images/user.png')}}" width="30px" height="30px" class="img-responsive">
                        @else
                            <img src="{{URL::asset($com['image'])}}" width="30px" height="30px" class="img-responsive">
                        @endif
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            {{$com['name']}} <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="/company/profile">Profile</a></li>
                            <li><a href="/company/setting">Setting</a></li>
                            <li><a href="/logout/{{'company'}}">Log Out</a></li>
                        </ul>
                    </li>
                @else
                    <li><i class="fa fa-info" aria-hidden="true"></i><a href="/about-us">About</a></li>
                    <li><i class="fa fa-sign-in" aria-hidden="true"></i><a href="/login">Log In</a></li>
                    <li><i class="fa fa-pencil" aria-hidden="true"></i> <a href="/register">Sign Up</a></li>
                @endif
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>