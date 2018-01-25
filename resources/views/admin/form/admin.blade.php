@extends('admin.layout.main')

@section('content')
    <section id="main-content">
        <section class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header"><i class="fa fa-users"></i> Admins</h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="/dashboard/home">Home</a></li>
                        <li><i class="fa fa-table"></i>Form</li>
                        <li><i class="fa fa-th-list"></i>Admins</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-10">
                    <section class="panel">
                        <table class="table table-striped table-advance table-hover">
                            <tbody>
                                <tr>
                                    <th><i class="icon_id-2"></i>  ID</th>
                                    <th><i class="icon_profile"></i>  Name</th>
                                    <th><i class="icon_mail"></i>  UserName</th>
                                    <th><i class="icon_image"></i>  Image</th>
                                    <th><i class="icon_table"></i>  Create at</th>
                                    <th><i class="icon_cogs"></i>  Action</th>
                                </tr>
                                @foreach($admin as $admin)
                                    <tr>
                                        <td class="id">{{$admin['id']}}</td>
                                        <td>{{$admin['name']}}</td>
                                        <td>{{$admin['username']}}</td>
                                        @if(empty($admin['image']))
                                            <td><img src="{{URL::asset('src/images/user.png')}}" width="30px" class="img-responsive"></td>
                                        @else
                                            <td><img src="{{URL::asset($admin['image'])}}" width="30px" class="img-responsive"></td>
                                        @endif
                                        <td>{{$admin['created_at']}}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a class="btn btn-danger" href="/dashboard/delete-admin/{{$admin['id']}}">
                                                    <i class="icon_close_alt2"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </section>
                </div>
            </div>
        </section>
    </section>
@endsection