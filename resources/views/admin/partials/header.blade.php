<header class="header dark-bg">
    <div class="toggle-nav">
        <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
    </div>

    <!--logo start-->
    <a class="navbar-brand" href="/">
        <img src="{{URL::asset('src/images/logo.png')}}" width="50px"  class="img-responsive" alt="logo">
    </a>
    <!--logo end-->

    <div class="nav search-row" id="top_menu">
        <!--  search form start -->
        <ul class="nav top-menu">
            <li>
                <form class="navbar-form">
                    <input class="form-control" placeholder="Search" type="text">
                </form>
            </li>
        </ul>
        <!--  search form end -->
    </div>

    <div class="top-nav notification-row">
        <ul class="nav pull-right top-menu">
            <script type="@php($admin = Auth::guard('admin') -> user())"></script>
            <li class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <span class="profile-ava">
                                    @if(empty($admin['image']))
                                        <img src="{{URL::asset('src/images/user.png')}}" width="50px" class="img-responsive" alt="profile">
                                    @else
                                        <img src="{{URL::asset($admin['image'])}}" width="50px" class="img-responsive" alt="profile">
                                    @endif
                                </span>
                    <span class="username">{{$admin['name']}}</span>
                    <b class="caret"></b>
                </a>
                <ul class="dropdown-menu extended logout">
                    <div class="log-arrow-up"></div>
                    <li class="eborder-top">
                        <a href="#"><i class="icon_profile"></i> My Profile</a>
                    </li>
                    <li>
                        <a href="/logout/admin"><i class="icon_key_alt"></i> Log Out</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</header>
      