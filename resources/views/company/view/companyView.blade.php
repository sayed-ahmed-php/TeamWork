@extends('layout.main')

@section('content')
    <link href="{{URL::asset('src/css/user-profile.css')}}" rel="stylesheet">
    <!--	   Start wrapper -->
    <div class="wrapper">
        <div class="container">
            <div class="row">
                <div class="middle">
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
                                </li>
                                <li class="Name"><h4>{{$com['name']}}</h4></li>
                                <li></i><span>{{$com['field']}}</span></li>
                                <li><i class="fa fa-map-marker" aria-hidden="true"></i><span>{{$com['country']}}</span></li>
                                <li>
                                    @if(!empty($com['overview']))
                                        <p id="overview">{{$com['overview']}}</p>
                                    @else
                                        <p id="overview">No overview.</p>
                                    @endif
                                </li>
                            </ul>
                        </div>

                    </div>
                    <!--					  					   End info-->

                    <!--				Portfolio-->
                    <div class="col-md-8 col-sm-7">
                        <div class="portfolio">
                            <div class="port-header">
                                <h1>portfolio</h1>
                            </div>
                            <div class="projects">
                                @if (!empty($portfolio))
                                    @foreach($portfolio as $portfolio)
                                        <div class="col-md-6">
                                            <div class="works">
                                                <h6 class="hidden">{{$portfolio['id']}}</h6>
                                                <img src="{{URL::asset($portfolio['image'])}}" class="img-responsive">
                                                <div class="work-edit">
                                                    <button data-toggle="modal" data-target="#view-project"
                                                            class="form-control btn btn-view-work">View</button>
                                                </div>
                                            </div>
                                        </div>
                                        @include('company.view.companyView')
                                    @endforeach
                                @else
                                    <center><div class="works">No item to display.</div></center>
                                @endif
                            </div>
                        </div>
                    </div>
                    <!--			End portoflio		   -->
                </div>
            </div>
        </div>
        <!--			   End middle-->
    </div>
    <!--	   End wrapper -->
@endsection

@section('title')

@endsection