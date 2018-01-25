@extends('admin.layout.main')

@section('content')
    <section id="main-content">
        <section class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header"><i class="fa fa-users"></i> User</h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="/dashboard/home">Home</a></li>
                        <li><i class="fa fa-table"></i>Table</li>
                        <li><i class="fa fa-th-list"></i>Users</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-18">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="dataTables_length" id="datatable_length">
                                <label> Show
                                    <select name="datatable_length" aria-controls="datatable" class="form-control input-sm">
                                        <option value="10">10</option>
                                        <option value="25">25</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                    </select>
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div id="datatable_filter" class="dataTables_filter">
                                <label>Search:
                                    <input type="search" class="form-control input-sm" aria-controls="datatable">
                                </label>
                            </div>
                        </div>
                    </div>
                    <section class="panel">
                        <table class="table table-striped table-advance table-hover">
                            <tbody>
                                <tr>
                                    <th><i class="icon_id-2"></i>  ID</th>
                                    <th><i class="icon_profile"></i> Name</th>
                                    <th><i class="icon_mail"></i>  E-Mail</th>
                                    <th><i class="icon_phone"></i>  Phone</th>
                                    <th><i class="icon_cogs"></i>  Country</th>
                                    <th><i class="icon_book_alt"></i>  Field</th>
                                    <th><i class="icon_adjust-vert"></i>  Skill</th>
                                    <th><i class="icon_book"></i>  Degree</th>
                                    <th><i class="icon_chat"></i>  Overview</th>
                                    <th><i class="icon_image"></i>  Image</th>
                                    <th><i class="icon_star"></i>  State</th>
                                    <th><i class="icon_rook"></i>  Create at</th>
                                    <th><i class="icon_rook"></i>  Data Table</th>
                                    <th><i class="icon_cog"></i>  Action</th>
                                </tr>
                                @foreach($user as $user)
                                    <tr>
                                        <td class="id">{{$user['id']}}</td>
                                        <td>{{$user['fname'].' '.$user['lname']}}</td>
                                        <td>{{$user['email']}}</td>
                                        <td>{{$user['phone']}}</td>
                                        <td>{{$user['country']}}</td>
                                        <td>{{$user['field']}}</td>
                                        <td>{{$user['skill']}}</td>
                                        <td>{{$user['degree']}}</td>
                                        <td>{{$user['overview']}}</td>
                                        @if(empty($user['image']))
                                            <td><img src="{{URL::asset('src/images/user.png')}}" width="30px" class="img-responsive"></td>
                                        @else
                                            <td><img src="{{URL::asset($user['image'])}}" width="30px" class="img-responsive"></td>
                                        @endif
                                        <td>{{$user['state']}}</td>
                                        <td>{{$user['created_at']}}</td>
                                        <td>
                                            <select class="row data-table {{$user['id']}}" data-id="{{$user['id']}}">
                                                <option selected hidden>Select Table ..</option>
                                                <option class="port">Portfolio</option>
                                                <option class="cert">Certification</option>
                                                <option class="edu">Education</option>
                                                <option class="skill">Skill</option>
                                                <option class="test">Test</option>
                                            </select>
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <a class="btn btn-danger" href="/dashboard/delete-user/{{$user['id']}}">
                                                    <i class="icon_close_alt2"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </section>
                    <div class="content-user"></div>
                </div>
            </div>
        </section>
    </section>
    <script src="{{URL::asset('script/adminTable.js')}}"></script>
@endsection