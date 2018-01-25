@extends('layout.main')

@section('content')
    <link href="{{URL::asset('src/css/user-profile.css')}}" rel="stylesheet">
    <!--	   Start wrapper -->
    <div class="wrapper">
        <div class="container">
            <div class="middle">
                <div class="row">
                    @if($t == 'f' and $t1 == 'f')
                        <a href="#" class="btn btn-primary add-button" data-id="{{$user['id']}}">Add</a>
                    @endif
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
                                </li>
                                <li><h4>{{$user['fname'].' '.$user['lname']}}</h4></li>
                                <li><span>{{$user['field'].' - '.$user['skill']}}</span></li>
                                <li><label>Rate</label><span>{{$user['degree']}}</span></li>
                                <li><i class="fa fa-map-marker" aria-hidden="true"></i><span>{{$user['country']}}</span></li>
                                <li>
                                    @if(!empty($user['overview']))
                                        <p>{{$user['overview']}}</p>
                                    @else
                                        <p>No overview</p>
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
                                        @include('user.view.viewPortfolio')
                                    @endforeach
                                @else
                                    <center><p>No item to display.</p></center>
                                @endif
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
                            </div>
                            @if (!empty($education))
                                @foreach($education as $education)
                                    <div class="edu">
                                        <h6 class="hidden">{{$education['id']}}</h6>
                                        <label class="school">{{$education['school']}}  &#124;
                                            <span class="degree">{{$education['degree']}}</span>
                                            <span class="time">{{$education['start'].' - '.$education['end']}}</span>
                                        </label>
                                    </div>
                                @endforeach
                            @else
                                <center><p>No item to display.</p></center>
                            @endif
                        </div>
                    </div>
                    <!--						   End education-->

                    <!--						   start test-->

                    <div class="col-md-8 col-sm-7 ">
                        <div class="test">
                            <div class="test-header">
                                <h1>Tests</h1>
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
                                </div>
                                @if (!empty($skill))
                                    @foreach($skill as $skill)
                                        <div>
                                            <h6 class="hidden">{{$skill['id']}}</h6>
                                            <ul class="skills">
                                                <li><span>{{$skill['skill']}}</span></li>
                                            </ul>
                                            <p>{{$skill['overview']}}</p>
                                        </div>
                                    @endforeach
                                @else
                                    <center><p>No item to display.</p></center>
                                @endif
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
                                </div>
                                <div class="cert-data">
                                    @if (!empty($certification))
                                        @foreach($certification as $certification)
                                            <div class="col-md-6">
                                                <div class="certifcate-data">
                                                    <h6 class="hidden">{{$certification['id']}}</h6>
                                                    <img src="{{URL::asset($certification['image'])}}" class="img-responsive" alt="cert">
                                                    <div class="certification-edit" >
                                                        <a href="" data-toggle="modal" class="btn btn-cert-view" data-target="#view-cert">View</a>
                                                    </div>
                                                </div>
                                            </div>
                                            @include('user.view.viewCertification')
                                        @endforeach
                                    @else
                                        <center><p>No item to display.</p></center>
                                    @endif
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
    <script type="text/javascript">
        $('.add-button').on('click', function (e) {
            e.preventDefault();
            let id = e.target.dataset['id'];

            $.ajax({
                type : 'get',
                url : '/add-user',
                data : {id : id},
                success : function () {
                    $('.add-button').replaceWith('<span class="add-button" style="color: #2ac845">✔✔ Added Successfully.</span>');
                }
            });
        });
    </script>
    <!--	   End wrapper -->
@endsection

@section('title')
    {{$user['fname'].' '.$user['lname']}}
@endsection