@extends('layout.main')

@section('content')
    <link href="{{URL::asset('src/css/user-profile.css')}}" rel="stylesheet">
    <!--	   Start wrapper -->

    <div class="wrapper">
        <div class="container">
            <div class="middle">
                @if(count($errors) > 0)
                    <div class="row text-center col-lg-offset-5 col-md-6">
                            <div class="alert alert-danger">
                                <strong>
                                    @foreach($errors -> all() as $error)
                                        <p>{{$error}}</p>
                                    @endforeach
                                </strong>
                            </div>
                    </div>
                @endif
                <div class="row">
                    <!--					  					   Start info-->
                    <div class=" col-md-4 col-sm-5 ">
                        <div class="info">
                            <ul>
                                <li class="img-profile">
                                    @if(empty($user['image']))
                                        <img src="{{URL::asset('src/images/user.png')}}" width="128px" class="img-responsive" alt="profile">
                                    @else
                                        <img src="{{URL::asset($user['image'])}}" width="128px" class="img-responsive" alt="profile">
                                    @endif
                                    <button class="btn btn-edit-img" data-toggle="modal" data-target="#edit-img">
                                        <i class="fa fa-pencil" aria-hidden="true"></i>
                                    </button>
                                </li>
                                <li class="Name"><h4>{{$user['fname'].' '.$user['lname']}}</h4>
                                    <button class="btn btn-editName" data-toggle="modal" data-target="#EditName">
                                        <i class="fa fa-pencil" aria-hidden="true"></i>
                                    </button>
                                </li>
                                <li><span class="jop">{{$user['field'].' - '.$user['skill']}}</span></li>
                                <li><i class="fa fa-map-marker" aria-hidden="true"></i><span>{{$user['country']}}</span></li>
                                <li>
                                    @if(!empty($user['overview']))
                                        <p id="overview-user">{{$user['overview']}}</p>
                                    @else
                                        <p id="overview-user">Write your overview</p>
                                    @endif
                                </li>
                            </ul>
                            @include('user.profile.edit.image')
                            @include('user.profile.edit.name')
                        </div>
                    </div>
                    <!--					  					   End info-->

                    <!--				Portfolio-->
                    <div class="col-md-8 col-sm-7">

                        <div class="portfolio">

                            <div class="port-header">
                                <h1>portfolio</h1>
                                <button class="btn btn-port-add" data-toggle="modal" data-target="#add-project">
                                    <i class="fa fa-plus-circle fa" aria-hidden="true"></i>
                                </button>
                            </div>
                            @include('user.profile.portfolio.addPortfolio')
                            <div class="projects">
                                @if (!empty($portfolio))
                                    @foreach($portfolio as $portfolio)
                                        <div class="col-md-6">
                                            <div class="works">
                                                <img src="{{URL::asset($portfolio['image'])}}" class="img-responsive">
                                                <div class="work-edit" data-id="{{$portfolio['id']}}">
                                                    <button class="form-control btn btn-view-work">View</button>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <center><p>No item to display.</p></center>
                                @endif
                                <div class="modal fade" id="view-project" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"></div>
                            </div>
                        </div>
                    </div>
                    <!--			End portoflio		   -->
                </div>

                <div class="row">
                    <!--						   Start education-->
                    <div class="col-md-4 col-sm-5">
                        <div class="education">
                            <div class="education-header">
                                <h1>education</h1>
                                <button class="btn btn-education-add" data-toggle="modal" data-target="#add-education">
                                    <i class="fa fa-plus-circle fa" aria-hidden="true"></i>
                                </button>
                            </div>
                            @include('user.profile.education.addEducation')
                            @if (!empty($education))
                                @foreach($education as $education)
                                    <div class="edu">
                                        <label class="school">{{$education['school']}}  &#124;
                                            <span class="degree">{{$education['degree']}}</span>
                                            <span class="time">{{$education['start'].' - '.$education['end']}}</span>
                                        </label>
                                        <button class="btn btn-education-edit" data-id="{{$education['id']}}">
                                            <i class="fa fa-pencil" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                    <hr>
                                @endforeach
                            @else
                                <center><p>No item to display.</p></center>
                            @endif
                            <div class="modal fade" id="edit-education" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"></div>
                        </div>
                    </div>
                    <!--						   End education-->

                    <!--						   start test-->
                    <div class="col-md-8 col-sm-7 ">
                        <div class="test">

                            <div class="test-header">
                                <h1>Tests</h1>
                                <a class="btn btn-test-add" href="/user/tests/all-tests">
                                    <i class="fa fa-plus-circle fa" aria-hidden="true"></i>
                                </a>
                            </div>
                            @if(!empty($test))
                                <table class="table table-striped">
                                    <thead class="thead-default">
                                    <tr>
                                        <th>Name</th>
                                        <th>Score</th>
                                        <th>Time</th>
                                    </tr>
                                    @foreach($test as $test)
                                        <tr>
                                            <th>{{$test['name']}}</th>
                                            <th>{{$test['degree']}}</th>
                                            <th>{{$test['time']}}</th>
                                        </tr>
                                    @endforeach
                                </table>
                            @else
                                <p class="col-md-4">No item to display.</p>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="row">

                    <!--						   Start skills-->
                    <div class="col-md-4 col-sm-5 col-xs-12">
                        <div class="skill">
                            <div class="other-details">
                                <div class="skill-header">
                                    <h1>skill</h1>
                                    <button class="btn btn-skill-add" data-toggle="modal" data-target="#add-experience">
                                        <i class="fa fa-plus-circle fa" aria-hidden="true"></i>
                                    </button>
                                    @include('user.profile.skill.experience')
                                </div>
                                <div class="row">
                                    @if (!empty($skill))
                                        @foreach($skill as $skill)
                                            <div class="skill-d" data-id="{{$skill['id']}}">
                                                <h6 class="hidden">{{$skill['id']}}</h6>
                                                <ul class="skills">
                                                    <li><span>{{$skill['skill']}}</span></li>
                                                </ul>
                                                <p>{{$skill['overview']}}</p>
                                                <button class="btn btn-skill-edit" data-id="{{$skill['id']}}">
                                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                                </button>
                                            </div>
                                            <hr>
                                        @endforeach
                                    @else
                                        <center><p>No item to display.</p></center>
                                    @endif
                                <div class="modal fade" id="edit-skill" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--						   End skills-->

                    <!--      Start Section Certification-->
                    <div class="col-md-8 col-sm-7 col-xs-12">
                        <div class="certification">
                            <div class="cert-details">
                                <div class="cert-header">
                                    <h1>certification</h1>
                                    <button class="btn btn-cert-add" data-toggle="modal" data-target="#add-cert">
                                        <i class="fa fa-plus-circle fa" aria-hidden="true"></i>
                                    </button>
                                </div>
                                @include('user.profile.certification.addCertification')
                                <div class="cert-data">
                                    @if (!empty($certification))
                                        @foreach($certification as $certification)
                                            <div class="col-md-6">
                                                <div class="certifcate-data">
                                                    <h6 class="hidden">{{$certification['id']}}</h6>
                                                    <img src="{{URL::asset($certification['image'])}}" class="img-responsive" alt="cert">
                                                    <div class="certification-edit" data-id="{{$certification['id']}}">
                                                        <a href="" class="btn btn-cert-view">View</a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <center><p>No item to display.</p></center>
                                    @endif
                                        <div class="modal fade" id="view-cert" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--      End Section Certification-->
                </div>
                <!--			   End middle-->
            </div>
        </div>
    </div>
    <!--	   End wrapper -->
    <script src="{{URL::asset('script/overview.js')}}"></script>
    <script src="{{URL::asset('script/profile.js')}}"></script>
@endsection

@section('title')
    {{$user['fname'].' '.$user['lname']}}
@endsection