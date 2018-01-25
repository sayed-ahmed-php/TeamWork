@extends('layout.main')

@section('content')
    <link href="{{URL::asset('src/css/setting.css')}}" rel="stylesheet">
    <link href="{{URL::asset('src/css/profile.css')}}" rel="stylesheet">
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-xs-12">
                    <div class="side-nav">
                        <aside>
                            <h3>User settings</h3>
                            <ul>
                                <li><a onclick="pass()">Change Password</a></li>
                                <li><a onclick="prof()">Profile Settings</a></li>
                                <li><a onclick="team()">The Team</a></li>
                            </ul>
                        </aside>
                    </div>
                    @if(count($errors) > 0)
                        <div class="alert alert-danger">
                            @foreach($errors -> all() as $error)
                                <p>{{$error}}</p>
                            @endforeach
                        </div>
                    @endif
                    @if(Session::has('fail'))
                        <div class="alert alert-danger">
                            <strong>{{Session::get('fail')}}</strong>
                        </div>
                    @endif
                </div>
                <section id="change">@include('company.setting.changePassword')</section>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function prof() {
            $("#change").load("/company/profile-setting");
        }
        function team() {
            $("#change").load("/company/team");
        }
        function pass() {
            $("#change").load("/company/change-password");
        }
    </script>
@endsection

@section('title')
    My profile
@endsection