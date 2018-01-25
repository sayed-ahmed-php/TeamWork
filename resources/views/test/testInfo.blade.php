@extends('layout.main')

@section('content')
    <link rel="stylesheet" href="{{URL::asset('src/css/All-testPage.css')}}">
    <section class="start-test">
        <div class="container">
            <h1>PHP Test</h1>
            <div class="row">
                <div class="col-md-7">
                    <div class="test-ready">
                        <p>{{$test['overview']}}</p>
                        <a href="/user/tests/start/{{$test['name']}}/{{Auth::guard('web') -> user() -> id}}" class="btn btn-primary">Start Test</a>
                    </div>
                </div>
                <div class="col-md-3">
                    <label>Test Contents</label>
                    @if($test['name'] == ('Php'))
                        <ul class="test-content">
                            <li>Language Basics</li>
                            <li>Arrays, Strings and Regex</li>
                            <li>Design Patterns</li>
                            <li>Application Security</li>
                            <li>Object Oriented Design</li>
                            <li>Database Handling</li>
                            <li>Exception Handling</li>
                            <li>Debugging</li>
                            <li>File Handling</li>
                            <li>Mail Handling</li>
                        </ul>
                    @elseif($test['name'] == ('Java'))
                        <ul class="test-content">
                            <li>Class Design & OOP Principles</li>
                            <li>Generics & Collections</li>
                            <li>Data Access</li>
                            <li>Threads & Concurrency</li>
                            <li>Language Basics</li>
                            <li>Tools & Other Standard Libraries</li>
                            <li>Architecture</li>
                            <li>Swing, AWT & JAVAFX</li>
                        </ul>
                    @elseif($test['name'] == ('Html_Css'))
                        <ul class="test-content">
                            <li>Elements</li>
                            <li>Canvas</li>
                            <li>SVG</li>
                            <li>•Input types</li>
                            <li>Forms</li>
                            <li>Web storage</li>
                            <li>App cache</li>
                            <li>Workers</li>
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection

@section('title')
    All Tests
@endsection