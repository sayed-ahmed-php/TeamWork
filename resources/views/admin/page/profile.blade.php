@extends('admin.layout.main')

@section('content')
    <section id="main-content">
        <section class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header"><i class="fa fa-files-o"></i> Admin Profile</h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
                        <li><i class="icon_document_alt"></i>Pages</li>
                        <li><i class="fa fa-files-o"></i>Profile</li>
                    </ol>
                </div>
            </div>
            <!-- Form validations -->
            @if(Session::has('fail'))
                <div class="alert alert-danger">
                    <strong>{{Session::get('fail')}}</strong>
                </div>
            @endif
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Edit Profile
                        </header>
                        <div class="panel-body">
                            <div class="form">
                                <form class="form-validate form-horizontal" enctype="multipart/form-data" method="post" action="/dashboard/admin-profile">
                                    <div class="form-group ">
                                        <label for="cname" class="control-label col-lg-2">Name<span class="required"></span></label>
                                        <div class="col-lg-10">
                                            <input class="form-control" id="cname" name="name" minlength="5"
                                                   type="text" required value="{{$admin['name']}}"/>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="cemail" class="control-label col-lg-2">UserName <span class="required"></span></label>
                                        <div class="col-lg-10">
                                            <input class="form-control " id="cemail" type="text" name="username" required value="{{$admin['username']}}"/>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="curl" class="control-label col-lg-2">Image</label>
                                        <div class="col-lg-10">
                                            <input class="form-control " id="curl" type="file" name="image"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-lg-offset-2 col-lg-10">
                                            <input class="btn btn-primary" type="submit" value="Update">
                                        </div>
                                    </div>
                                    {{csrf_field()}}
                                </form>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Change The Password
                        </header>
                        <div class="panel-body">
                            <div class="form">
                                <form class="form-validate form-horizontal" method="post" action="/dashboard/admin-change-pass">
                                    <div class="form-group ">
                                        <label for="cname" class="control-label col-lg-2">Old Password<span class="required"></span></label>
                                        <div class="col-lg-10">
                                            <input class="form-control" id="cname" name="old" minlength="5" type="password" required />
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="cemail" class="control-label col-lg-2">New Password <span class="required"></span></label>
                                        <div class="col-lg-10">
                                            <input class="form-control " id="cemail" type="password" name="new" required />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-lg-offset-2 col-lg-10">
                                            <button class="btn btn-primary" type="submit">Save</button>
                                        </div>
                                    </div>
                                    {{csrf_field()}}
                                </form>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </section>
    </section>
@endsection