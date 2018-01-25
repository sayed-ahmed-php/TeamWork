@extends('admin.layout.main')

@section('content')
    <section id="main-content">
        <section class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header"><i class="fa fa-users"></i> Company</h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="/dashboard/home">Home</a></li>
                        <li><i class="fa fa-table"></i>Table</li>
                        <li><i class="fa fa-th-list"></i>Companies</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-18">
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
                                    <th><i class="icon_adjust-vert"></i>  Address</th>
                                    <th><i class="icon_book"></i>  URL</th>
                                    <th><i class="icon_chat"></i>  Overview</th>
                                    <th><i class="icon_image"></i>  Image</th>
                                    <th><i class="icon_rook"></i>  Create at</th>
                                    <th><i class="icon_rook"></i>  Portfolio</th>
                                    <th><i class="icon_cog"></i>  Action</th>
                                </tr>
                                @foreach($com as $com)
                                    <tr>
                                        <td class="id">{{$com['id']}}</td>
                                        <td>{{$com['name']}}</td>
                                        <td>{{$com['email']}}</td>
                                        <td>{{$com['phone']}}</td>
                                        <td>{{$com['country']}}</td>
                                        <td>{{$com['field']}}</td>
                                        <td>{{$com['address']}}</td>
                                        <td>{{$com['url']}}</td>
                                        <td>{{$com['overview']}}</td>
                                        @if(empty($com['image']))
                                            <td><img src="{{URL::asset('src/images/user.png')}}" width="30px" class="img-responsive"></td>
                                        @else
                                            <td><img src="{{URL::asset($com['image'])}}" width="30px" class="img-responsive"></td>
                                        @endif
                                        <td>{{$com['created_at']}}</td>
                                        <td><a class="com-port" data-id="{{$com['id']}}">Show</a></td>
                                        <td>
                                            <div class="btn-group">
                                                <a class="btn btn-danger" href="/dashboard/delete-company/{{$com['id']}}">
                                                    <i class="icon_close_alt2"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </section>
                    <div class="content-com"></div>
                </div>
            </div>
        </section>
    </section>
    <script src="{{URL::asset('script/adminTable.js')}}"></script>
@endsection