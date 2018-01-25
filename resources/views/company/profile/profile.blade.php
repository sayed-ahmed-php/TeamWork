@extends('layout.main')

@section('content')
    <link href="{{URL::asset('src/css/user-profile.css')}}" rel="stylesheet">
    <!--	   Start wrapper -->
    <div class="wrapper">
        <div class="container">
            <div class="row">
                <!--			   Start middle-->
                <div class="col-md-12">
                    <div class="row">
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
                            <!--					  					   Start info-->
                            <div class=" col-lg-4 col-sm-5 ">

                                <div class="info">
                                    <ul>
                                        <li class="img-profile" >
                                            @if(empty($com['image']))
                                                <img src="{{URL::asset('src/images/user.png')}}" width="128px" class="img-responsive" alt="profile">
                                            @else
                                                <img src="{{URL::asset($com['image'])}}" width="128px" class="img-responsive" alt="profile">
                                            @endif
                                            <button class="btn btn-edit-img" data-toggle="modal" data-target="#edit-img">
                                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                            </button>
                                        </li>
                                        <li class="Name"><h4>{{$com['name']}}</h4>
                                            <button class="btn btn-editName" data-toggle="modal" data-target="#EditName">
                                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                            </button>
                                        </li>
                                        <li></i><span>{{$com['field']}}</span></li>
                                        <li><i class="fa fa-map-marker" aria-hidden="true"></i><span>{{$com['country']}}</span></li>
                                        <li>
                                            @if(!empty($com['overview']))
                                                <p id="overview-com">{{$com['overview']}}</p>
                                            @else
                                                <p id="overview-com">Write your overview.</p>
                                            @endif
                                        </li>
                                    </ul>
                                    @include('company.profile.image')
                                    @include('company.profile.name')
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
                                        @include('company.profile.addPortfolio')
                                    </div>
                                    <div class="projects">
                                        @if (!empty($portfolio))
                                            @foreach($portfolio as $portfolio)
                                                <div class="col-md-6">
                                                    <div class="works work-com">
                                                        <h6 class="hidden">{{$portfolio['id']}}</h6>
                                                        <img src="{{URL::asset($portfolio['image'])}}" class="img-responsive">
                                                        <div class="work-edit" data-id="{{$portfolio['id']}}">
                                                            <button class="form-control btn btn-view-work">View</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @else
                                            <center><div class="works">No item to display.</div></center>
                                        @endif
                                        <div class="modal fade" id="view-project" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"></div>
                                    </div>
                                </div>
                            </div>
                            <!--			End portoflio		   -->
                        </div>
                    </div>
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
    {{$com['name']}}
@endsection