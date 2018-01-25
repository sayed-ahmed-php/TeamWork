@extends('layout.main')

@section('content')
    <link rel="stylesheet" href="{{URL::asset('src/css/All-testPage.css')}}">
    <section class="start-test">
        <div class="container">
            <h1>{{$name}}</h1>
            <div class="row">
                <div class="col-md-7">
                    <div class="test-ready">
                        <p>{{$result}}</p>
                        <p>yep</p>
                        <a href="/user/profile" class="btn btn-primary">Finish</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('title')
    Test Result
@endsection