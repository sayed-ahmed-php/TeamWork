@extends('layout.main')

@section('content')
    <link href="{{URL::asset('src/css/about.css')}}" rel="stylesheet">
    <br>
    <br>
    <section class="head text-center center-block">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
    </section>
    <section class="headline text-center">
        <h1>About Us</h1>
        <hr class="center-block">
        <p> The best companies win with the best talent. But great people can be hard to find. We’ve created a freelancing website that
            connects clients with top freelance professionals all over the world.</p>
    </section>
    <section class="mission center-block">
        <div class="container">
            <div class="row">
                <div class="item center-block">
                    <img src="{{URL::asset('src/images/mission.jpg')}}" width="400" class="col-lg-5 col-md-4 col-sm-4 col-xs-12">
                    <div class="right-side col-lg-7 col-md-8 col-sm-8 col-xs-12">
                        <h4>OUR MISSION</h4>
                        <p>To create economic and social value on a global scale by providing a trusted<br>
                            online workplace to connect, collaborate, and succeed.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="vision center-block">
        <div class="container">
            <div class="row">
                <div class="item center-block">
                    <img src="{{URL::asset('src/images/vision.jpg')}}" width="400" class="col-lg-5 col-md-4 col-sm-4 col-xs-12">
                    <div class="right-side col-lg-7 col-md-8 col-sm-8 col-xs-12">
                        <h4>OUR VISION</h4>
                        <p>To connect businesses with great talent faster than ever before.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="img">
        <img src="{{URL::asset('src/images/pg.PNG')}}" class="img-responsive">
    </section>
    <section class="story">
        <div class="row">
            <div class="item center-block">
                <h4 class="middle">OUR STORY</h4>
                <p>Our story begins with two leading pioneers in online work: Elance® and oDesk®.
                    For years, each had followed a separate path, investing time and resources – and
                    gathering amazingly talented people – to create thriving global communities with high
                    levels of customer satisfaction and industry recognition.
                </p>
            </div>
        </div>
    </section>
@endsection

@section('title')
    About Us
@endsection