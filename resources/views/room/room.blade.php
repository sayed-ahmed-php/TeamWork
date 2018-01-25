@extends('layout.main')

@section('content')
    <link href="{{URL::asset('src/css/room.css')}}" rel="stylesheet">
    <section class="content room">
        <div class="container">
            <div class="row">
                @if(count($errors) > 0)
                    <div class="row text-center col-lg-offset-4 col-md-5">
                        <div class="alert alert-danger">
                            <strong>
                                @foreach($errors -> all() as $error)
                                    <p>{{$error}}</p>
                                @endforeach
                            </strong>
                        </div>
                    </div>
                @endif
                <div class="col-lg-8 col-lg-offset-2 content-post">
                    <div class="write-post">
                        <div class="profile-img">
                            @if(empty(Auth::guard('web') -> user() -> image))
                                <img src="{{URL::asset('src/images/user.png')}}" width="128px" class="img-responsive" alt="profile">
                            @else
                                <img src="{{URL::asset(Auth::guard('web') -> user() -> image)}}" width="128px" class="img-responsive" alt="profile">
                            @endif
                        </div>
                        <div class="post-content">
                            <form class="form-group" method="post">
                                <textarea class="form-control" name="body" id="new-post" rows="7" placeholder="Your Post ..." maxlength="1000"></textarea>
                                <br>
                                <button type="submit" class="btn btn-primary" id="add-post">Create Post</button>
                                {{csrf_field()}}
                            </form>
                        </div>
                    </div>
                    @include('room.addPost')
                </div>
            </div>
        </div>
    </section>
    @include('room.editPost')
    <script>
        var token = '{{ Session::token() }}';
    </script>
    <script src="{{URL::asset('script/room.js')}}"></script>
@endsection