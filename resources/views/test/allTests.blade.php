@extends('layout.main')

@section('content')
    <link rel="stylesheet" href="{{URL::asset('src/css/All-testPage.css')}}">
    <section class="browes-tests">
        <div class="container">
            <div class="tests-header">
                <h3>Skill Tests</h3>
                <p>Prove your skills and impress potential clients by taking a few free Teamwork tests! The more relevant tests you pass, the more professional you look.</p>
            </div>
            <!--				Test filter-->
            <div class="test-filter">
                <div class="row">
                    <div class="col-md-2">
                        <div class="dropdown">
                            <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">All Category
                                <span class="caret"></span></button>
                            <ul class="dropdown-menu">
                                <li><a href="#">Java</a></li>
                                <li><a href="#">Html</a></li>
                                <li><a href="#">Php</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3">	<input type="text" class="form-control" placeholder="Keyword"></div>
                    <div class="col-md-2"><input type="submit" class="form-control btn-primary" value="Search"></div>
                </div>
            </div>
            <!--				Test Table-->
            <div class="test-table">
                <table class="table table-responsive ">
                    <tr>
                        <th>Title</th>
                        <th>Category</th>
                        <th class="text-center hidden-xs">Time Estimated</th>
                    </tr>
                    @foreach($test as $test)
                        <tr>
                            <td class="title"><a href="/user/tests/{{$test['id']}}">{{$test['name']}}</a></td>
                            <td>{{$test['category']}}</td>
                            <td class="text-center hidden-xs">40</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </section>
@endsection

@section('title')
    All Tests
@endsection