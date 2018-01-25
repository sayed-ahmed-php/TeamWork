<!DOCTYPE html>
<html lang="en">
<head>
    <title>Log In</title>
	<l<link rel="shortcut icon" href="{{URL::asset('src/images/logo.png')}}"/>
	
    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
    <link href="{{URL::asset('src/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('src/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('src/css/sign.css')}}" rel="stylesheet">
</head>
<body>
<div class="signUp">
    <div class="sign-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-sm-offset-4 col-sm-5 col-xs-12">
                    <h3 class="text-center">Sign Up</h3>
                    @if(count($errors) > 0)
                        <div class="alert alert-danger">
                            @foreach($errors -> all() as $error)
                                <p>{{$error}}</p>
                            @endforeach
                        </div>
                    @endif
                    <ul class="nav nav-tabs center-block">
                        <li role="presentation" class="active"><a href="#signup" data-toggle="tab"> User</a>
                        </li>
                        <li role="presentation"><a href="#signup2" data-toggle="tab">company</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div id="signup" class="center-block tab-pane active">
                            <form class="form-group" action="/user-register" method="post">
                                <input type="text" placeholder="First Name" name="fname" class = "form-control" pattern="[a-zA-Z]{3,10}}"
                                       title="Must contain alpha only and length between 3:10 letters." required>

                                <input type="text" placeholder="Last Name" name="lname" class = "form-control" pattern="[a-zA-Z]{3,10}"
                                       title="Must contain alpha only and length between 3:10 letters." required>

                                <input type="email" placeholder="Email" name="email" class="form-control"
                                       pattern="[a-z0-9._%+-]+@[a-z]+\.[a-z]{2,3}$" title="Must be real E-Mail." required>

                                <input type="password" placeholder="Password" name="password" class = "form-control"
                                       pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required
                                       title="Must contain at least one number and one uppercase and lowercase letter and 8 characters at least.">

                                <input type="text" placeholder="phone number" name="phone" class = "form-control"
                                       pattern="(01)[0-9]{9}" title="Must contain exactly 11 number and real." required>

                                <select class="field form-control" name="country" required>
                                    <option selected hidden>Choose Your Country ..</option>
                                    @foreach($country as $country)
                                        <option>{{$country['name']}}</option>
                                    @endforeach
                                </select>

                                <select class="field form-control" name="field" id="cat-sign" required>
                                    <option selected hidden>Choose Category ..</option>
                                    @foreach($cat as $cat)
                                        <option>{{$cat['name']}}</option>
                                    @endforeach
                                </select>

                                <select class="field form-control" name="skill" id="skill-sign" required></select>
                                <input type="submit" value="Sign Up" class="form-control">
                                {{csrf_field()}}
                            </form>
                        </div>
                        <div id="signup2" class="tab-pane">
                            <script type="@php($country = \App\Models\Country::all())"></script>
                            <script type="@php($cat = \App\Models\MainCategory::all())"></script>
                            <form method="post" action="/company-register">
                                <input type="text" placeholder="Company Name" name="name" class="form-control" pattern="[a-zA-Z0-9 _]{5,20}"
                                       title="Must contain alpha only and length between 5:20 letters." required>

                                <input type="email" placeholder="E-Mail" name="email" class="form-control"
                                       pattern="[a-z0-9._%+-]+@[a-z]+\.[a-z]{2,3}$" title="Must be real E-Mail." required>

                                <input type="password" placeholder="Password" name="password" class="form-control"
                                       pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required
                                       title="Must contain at least one number and one uppercase and lowercase letter and 8 characters at least.">

                                <input type="text" placeholder="Phone Number" name="phone" class="form-control"
                                       pattern="(01)[0-9]{9}" title="Must contain exactly 11 number and real." required>

                                <select class="field form-control" name="country" required>
                                    <option selected hidden>Choose Your Country ..</option>
                                    @foreach($country as $country)
                                        <option>{{$country['name']}}</option>
                                    @endforeach
                                </select>

                                <select class="field form-control" name="field" required>
                                    <option selected hidden>Choose Your Field ..</option>
                                    @foreach($cat as $cat)
                                        <option>{{$cat['name']}}</option>
                                    @endforeach
                                </select>

                                <input type="text" placeholder="Company Address" name="address" class="form-control" pattern=".{10,30}"
                                       title="Must contain alpha only and length between 10:30 letters." required>

                                <input type="url" placeholder="Company Website Url" name="url" class="form-control" required>
                                <input type="submit" value="Sign Up" class="form-control">
                                {{csrf_field()}}
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{URL::asset('src/js/jquery-3.1.1.min.js')}}"></script>
<script src="{{URL::asset('src/js/bootstrap.min.js')}}"></script>
<script src="{{URL::asset('script/category.js')}}"></script>
</body>
</html>
