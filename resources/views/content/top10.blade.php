@extends('layout.main')

@section('content')
    <link href="{{URL::asset('src/css/Top10.css')}}" rel="stylesheet">
    <!--      Start section find best top 10 -->
    <div class="top-10 text-center">
        <div class="container" >
            <h1>The best</h1>
            <h2>{{$data['name']}}</h2>
        </div>
    </div>
    <!--      End section find best top 10 -->

    <!--      Start profile container-->
    <div class="second-view text-center  ">
        <div class="container-fluid">
            <div class="row">
                @foreach($user as $user)
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="second-profile">
                            <div class="front">
                                <img src="{{URL::asset($user['image'])}}"  width="100px" class="img-responsive" alt="photo">
                                <h4 class="text-center">{{$user['fname'].' '.$user['lname']}}</h4>
                                <span>{{$user['field'].' - '.$user['skill']}}</span>
                                <h3>{{$user['degree']}}</h3>
                                <ul class="state">
                                    <li class="left"><i class="fa fa-user" aria-hidden="true"></i><span>{{$user['state']}}</span> </li>
                                    <li class="right"><i class="fa fa-map-marker" aria-hidden="true"></i>
                                        <span>{{$user['country']}}</span> </li>
                                </ul>
                            </div>
                            <div class="back">
                                <h2>Awesome Man</h2>
                                <p>{{$user['overview']}}</p>
                                @if(Auth::guard('web') -> check())
                                    @if(Auth::guard('web') -> user() -> id == $user['id'])
                                        <a class="btn btn-default" href="/user/profile">View</a>
                                    @else
                                        <a class="btn btn-default" href="/user/user-profile/{{$user['id']}}">View</a>
                                    @endif
                                @elseif(Auth::guard('company') -> check())
                                    <a class="btn btn-default" href="/company/user-profile/{{$user['id']}}">View</a>
                                @else
                                    <a class="btn btn-default" href="/login">View</a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!--      End profile container-->

    <!--      start glance section-->
    <div class="glance">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-sm-5 hidden-xs">
                </div>

                <div class="col-lg-6 col-sm-7">
                    <div class="article">
                        <h1>{{$data['name']}}</h1>
                        <p>{{$data['overview']}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--      End glance section-->
@endsection

@section('title')
    Top 10 Rate
@endsection