@extends('layout.main')

@section('content')
    <link href="{{URL::asset('src/css/search.css')}}" rel="stylesheet">
    <section class="box-content center-block">
        <div class="container">
            <form  action="/s-search">
                <input type="text" placeholder="Search for Users only ..."  name="search" required>
                <input type="submit" value="Search">
                <div class="filter">
                    <select name="category" id="cat" required>
                        <option selected hidden>Choose Category ..</option>
                        @foreach($cat as $cat)
                            <option>{{$cat['name']}}</option>
                        @endforeach
                    </select>
                    <select id="skill" name="skill" required></select>
                </div>
                {{csrf_field()}}
            </form>
            @if(empty($user) && empty($com))
                <div class="result">
                    <center>No people such this name to display.</center>
                </div>
            @else
                @if(!empty($user))
                    @foreach($user as $user)
                    <div class="result">
                        @if(empty($user['image']))
                            <img src="{{URL::asset('src/images/user.png')}}" width="70">
                        @else
                            <img src="{{URL::asset($user['image'])}}" width="70">
                        @endif
                        <div class="text">
                            @if(Auth::guard('web') -> check())
                                @if(Auth::guard('web') -> user() -> id == $user['id'])
                                    <h4><a href="/user/profile">{{$user['fname'].' '.$user['lname']}}</a></h4>
                                @else
                                    <h4><a href="/user/user-profile/{{$user['id']}}">{{$user['fname'].' '.$user['lname']}}</a></h4>
                                @endif
                                @elseif(Auth::guard('company') -> check())
                                    <h4><a href="/company/user-profile/{{$user['id']}}">{{$user['fname'].' '.$user['lname']}}</a></h4>
                                @else
                                    <h4><a href="/login">{{$user['fname'].' '.$user['lname']}}</a></h4>
                                @endif
                                <h6>{{$user['field'].' - '.$user['skill']}}</h6>
                            </div>
                            <h5><i class="fa fa-map-marker" aria-hidden="true"></i> {{$user['country']}}</h5>
                        </div>
                    @endforeach
                @endif
                @if(!empty($com))
                    @foreach($com as $com)
                        <div class="result">
                            @if(empty($com['image']))
                                <img src="{{URL::asset('src/images/user.png')}}" width="70">
                            @else
                                <img src="{{URL::asset($com['image'])}}" width="70">
                            @endif
                            <div class="text">
                                @if(Auth::guard('company') -> check())
                                    @if(Auth::guard('company') -> user() -> id == $com['id'])
                                        <h4><a href="/company/profile">{{$com['name']}}</a></h4>
                                    @else
                                        <h4><a href="/company/company-profile/{{$com['id']}}">{{$com['name']}}</a></h4>
                                    @endif
                                @elseif(Auth::guard('web') -> check())
                                    <h4><a href="/user/company-profile/{{$com['id']}}">{{$com['name']}}</a></h4>
                                @else
                                    <h4><a href="/login">{{$com['name']}}</a></h4>
                                @endif
                                <h6>{{$com['field']}}</h6>
                                <h6>{{$com['address']}}</h6>
                            </div>
                            <h5><i class="fa fa-map-marker" aria-hidden="true"></i> {{$com['country']}}</h5>
                        </div>
                    @endforeach
                @endif
            @endif
        </div>
    </section>
    <script src="{{URL::asset('script/category.js')}}"></script>
@endsection

@section('title')
    {{$name}}
@endsection
