<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="description" content="Create team site that healp peaople to find ,create quikly great team">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="HTML,CSS,JQUERY,bootstrap">
    <meta name="author" content="Diaa ibrahiem">

    <title>Create Team</title>
	<l<link rel="shortcut icon" href="{{URL::asset('src/images/logo.png')}}"/>

    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
    <link href="{{URL::asset('src/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('src/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('src/css/style.css')}}" rel="stylesheet">
</head>
<body>
    <!--	Start section header-->
    <header class="text-center">
        <!--      nav bar-->
        <div class="layout">
            <nav id="nav-index" class="navbar navbar-default navbar-fixed-top">
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
                        <a class="navbar-brand" href="/"><img src="{{URL::asset('src/images/logo.png')}}"
                                                              width="50px"  class="img-responsive" alt="logo"> </a>
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
                        <script type="@php($user = Auth::guard('web') -> user())"></script>
                        <script type="@php($com = Auth::guard('company') -> user())"></script>
                        <ul class="nav navbar-nav navbar-right">
                            @if (Auth::guard('web') -> check())
                                <li class="dropdown">
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
                                    @if(empty($user['image']))
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
            <!--      End nav-->

            <div class="container">
                <div class="header-data">
                    <h1>Wlecome to <span>Team Work</span> <br></h1>
                    <h2>it's simple &amp; save </h2>
                    @if (Auth::guard('web') -> check())
                        <a href="/user/profile" class="btn btn-default btn-getstarted">Get started</a>
                    @elseif(Auth::guard('company') -> check())
                        <a href="/company/profile" class="btn btn-default btn-getstarted">Get started</a>
                    @else
                        <a href="/login" class="btn btn-default btn-getstarted">Get started</a>
                    @endif
                </div>
            </div>
        </div>
    </header>
    <!--	End section header-->

    <!--		Start section category-->
    <div class="fields text-center">
        <div class="container">
            <div class="heading">
                <h1>Browse our categories</h1>
                <span>&#9679;</span>
            </div>
            <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="field-container">
                        <div class="field-front" style="display: block;">
                            <i class="fa fa-code fa-5x" aria-hidden="true"></i>
                            <span>WEB DEVELOPER</span>
                        </div>
                        <div class="field-back" style="display: none;">
                            <span>Front_End developer</span>
                            <span>Back-End developer</span>
                            <span>Software programmer</span>
                            <a href="">More .. </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="field-container">
                        <div class="field-front" style="display: block;">
                            <i class="fa fa-mobile fa-5x" aria-hidden="true"></i>
                            <span>Mobile DEVELOPER</span>
                        </div>
                        <div class="field-back" style="display: none;">
                            <span>Android developer</span>
                            <span>ios app developer</span>
                            <span>ui/ux designer</span>
                            <a href="">More .. </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="field-container">
                        <div class="field-front">
                            <i class="fa fa-signal fa-5x" aria-hidden="true"></i>
                            <span>It manager</span>
                        </div>
                        <div class="field-back">
                            <span>Administration</span>
                            <span>Security</span>
                            <span>Problem Solving</span>
                            <a href="">More .. </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="field-container">
                        <div class="field-front">
                            <i class="fa fa-gamepad fa-5x" aria-hidden="true"></i>
                            <span>Games DEVELOPER</span>
                        </div>
                        <div class="field-back">
                            <span>Desktop games</span>
                            <span>Mobile games</span>
                            <span>Software programmer</span>
                            <a href="">More .. </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-3  col-sm-6 col-xs-12">
                    <div class="field-container">
                        <div class="field-front">
                            <i class="fa fa-linux fa-5x" aria-hidden="true"></i>
                            <span>Linux admin</span>
                        </div>
                        <div class="field-back">
                            <span></span>
                            <span>System Admin</span>
                            <span>Marketing</span>
                            <a href="">More .. </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-3  col-sm-6 col-xs-12">
                    <div class="field-container">
                        <div class="field-front">
                            <i class="fa fa-desktop fa-5x" aria-hidden="true"></i>
                            <span>Desktop app DEVELOPER</span>
                        </div>
                        <div class="field-back">
                            <span>Java developer</span>
                            <span>C# developer</span>
                            <span>Software programmer</span>
                            <a href="">More .. </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="field-container">
                        <div class="field-front">
                            <i class="fa fa-code fa-5x" aria-hidden="true"></i>
                            <span>WEB DESIGN</span>
                        </div>
                        <div class="field-back">
                            <span>Front_End developer</span>
                            <span>Back-End developer</span>
                            <span>Software programmer</span>
                            <a href="">More .. </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="field-container">
                        <div class="field-front">
                            <i class="fa fa-database fa-5x" aria-hidden="true"></i>
                            <span>Database</span>
                        </div>
                        <div class="field-back">
                            <span>MySQL</span>
                            <span>Oracle</span>
                            <span>Sun</span>
                            <a href="">More .. </a>
                        </div>
                    </div>
                </div>
            </div>
            <a href="" class="btn btn-default">See All Categories</a>
        </div>
    </div>
    <!--		End section category-->

    <!--      Start section carousel-->
    <div class="qoute ">
        <div class="container">
            <div class="row">
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner" role="listbox">
                        <div class="item active">
                            <div class="col-md-6 col-xs-12">
                                <i class="fa fa-quote-left fa-2x hidden-xs"></i>
                                <p>Contrary to popular belief, Lorem Ipsum is not simply random text .</p>
                                <div class="founder">
                                    <span>Diaa ibrahiem</span>
                                    <span>founder of create team</span>
                                </div>
                                <a href="" class="btn btn-primary">More stories</a>
                            </div>
                            <div class="col-md-6 col-sm-12 hidden-xs">
                                <img src="{{URL::asset('src/images/qouteimg.jpg')}}" class="img-responsive" alt="img">
                            </div>
                        </div>
                        <div class="item">
                            <div class="col-md-6 col-xs-12">
                                <i class="fa fa-quote-left fa-2x hidden-xs"></i>
                                <p>Contrary to popular belief, Lorem Ipsum is not simply random text .</p>
                                <div class="founder">
                                    <span>Diaa ibrahiem</span>
                                    <span>founder of create team</span>
                                </div>
                                <a href="" class="btn btn-primary">More stories</a>
                            </div>
                            <div class="col-md-6 col-sm-12 hidden-xs">
                                <img src="{{URL::asset('src/images/qouteimg.jpg')}}" class="img-responsive" alt="img">
                            </div>
                        </div>
                        <div class="item">
                            <div class="col-md-6 col-xs-12">
                                <i class="fa fa-quote-left fa-2x hidden-xs"></i>
                                <p>Contrary to popular belief, Lorem Ipsum is not simply random text .</p>
                                <div class="founder">
                                    <span>Diaa ibrahiem</span>
                                    <span>founder of create team</span>
                                </div>
                                <a href="" class="btn btn-primary">More stories</a>
                            </div>
                            <div class="col-md-6 col-sm-12 hidden-xs">
                                <img src="{{URL::asset('src/images/qouteimg.jpg')}}" class="img-responsive" alt="img">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--      End carousel-->

    <!--Start section Top skills-->
    <div class="top-skills hidden-xs">
        <div class="container">
            <h1 class="text-center">Browes Top skills</h1>
            <div class="row">
                @foreach($skill as $skill)
                    <div class="col-sm-3">
                        <div class="side">
                            <ul>
                                <li><a href="/{{$skill['name']}}/top-10" >{{$skill['name']}}</a></li>
                            </ul>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!--End section Top skills-->

    <!--start section get started-->
    <div class="build-team text-center">
        <div class="contain">
            <h1>Build Your Team</h1>
            @if (Auth::guard('web') -> check())
                <a href="/user/setting" class="btn btn-primary">Get started</a>
            @elseif(Auth::guard('company') -> check())
                <a href="/company/setting" class="btn btn-primary">Get started</a>
            @else
                <a href="/login" class="btn btn-primary">Get started</a>
            @endif
        </div>
    </div>
    <!--End section get started-->

    <!--Start section keep in touch-->
    <div class="contact ">
        <div class="container">
            <div class="heading text-center">
                <h1 >keep in touch</h1>
                <span> &#9679; </span>
            </div>
            <div class="row">
                <div class="col-md-4 col-md-offset-1 col-sm-offset-hidden col-sm-5">
                    <div class="contact-data">
                        <ul>
                            <li><lable class="special">Address</lable> <span>Cairo</span></li>
                            <li><lable class="special">Email</lable> <a href="">TeamWork@gmail.com</a></li>
                            <li><lable class="special">Socail</lable>
                                <a href="#"> <i class="fa fa-facebook" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-5 col-sm-6">
                    <div class="contact-form">
                        <form class="form-group">
                            <input type="text" class="form-control name" placeholder="Name">
                            <input type="Email" class="form-control email" placeholder="Email" pattern="[a-zA-Z]{3,10}}"
                                   title="Must contain alpha only and length between 3:10 letters.">
                            <input type="text" class="form-control text" placeholder="Subject">
                            <textarea placeholder="Message" class="form-control"></textarea>
                            <input type="submit" class="form-control feedback" value="Submit">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End section keep in touch-->

    <!--Footer -->
    <footer class="text-center">
        <div class="container">
            <div class="social-media">
                <ul>
                    <li> <a href="" class="btn btn-social"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                    <li> <a href="" class="btn btn-social"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                    <li> <a href="" class="btn btn-social"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                    <li> <a href="" class="btn btn-social"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                    <li> <a href="" class="btn btn-social"><i class="fa fa-rss" aria-hidden="true"></i></a></li>
                </ul>
            </div>
            <img src="{{URL::asset('src/images/logo.png')}}" class="img-responsive" alt="logo">
            <div class="footer-data">
                <ul>
                    <li>Team Work</li>
                    <li>Fax : 0000000</li>
                    <li>Telephone : 0122 333333</li>
                </ul>
            </div>
            <div class="copy-right">
                <span>Copyright &copy; 2017 Team. All rights reserved.</span>
            </div>
        </div>
    </footer>
    <!--End footer-->

    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="{{URL::asset('src/js/jquery-3.1.1.min.js')}}"></script>
    <script src="{{URL::asset('src/js/bootstrap.min.js')}}"></script>
    <script src="{{URL::asset('src/js/edit.js')}}"></script>
    <script type="text/javascript">
        $('.feedback').on('click', function (e) {
            e.preventDefault();

            if ($('.name').val() !== '' && $('.email').val() !== '' && $('.text').val() !== ''){
                $('.name').val('');
                $('.email').val('');
                $('.text').val('');

                toastr.success('Thanks for your Feedback. 😁😁');
            }else {
                toastr.error('All Fields required.');
            }
        })
    </script>
</body>
</html>
