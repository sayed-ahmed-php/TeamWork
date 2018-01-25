@extends('admin.layout.main')

@section('content')
    <section id="main-content">
        <section class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header"><i class="fa fa-users"></i> Room</h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="/dashboard/home">Home</a></li>
                        <li><i class="fa fa-table"></i>Table</li>
                        <li><i class="fa fa-th-list"></i>Posts</li>
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
                                    <th><i class="icon_profile"></i> User ID</th>
                                    <th><i class="icon_mail"></i>  Text</th>
                                    <th><i class="icon_mail"></i>  Create at</th>
                                    <th><i class="icon_mail"></i>  Comment</th>
                                    <th><i class="icon_cog"></i>  Action</th>
                                </tr>
                                @foreach($post as $post)
                                    <tr>
                                        <td class="id">{{$post['id']}}</td>
                                        <td>{{$post['user_id']}}</td>
                                        <td>{{$post['text']}}</td>
                                        <td>{{$post['created_at']}}</td>
                                        <td><a id="get-comment" data-id="{{$post['id']}}" href="#">Show</a> </td>
                                        <td>
                                            <div class="btn-group">
                                                <a class="btn btn-danger" href="/dashboard/delete-post/{{$post['id']}}">
                                                    <i class="icon_close_alt2"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </section>
                </div>
                <div class="content-comment"></div>
            </div>
        </section>
    </section>
    <script src="{{URL::asset('script/adminTable.js')}}"></script>
@endsection