<div class="col-md-8 col-xs-12">
    <h1>Profile setttings</h1>
    <div class="collect">

        <div class="account-summary">
            <h4>{{$com['name']}}</h4>
            <hr>
            <ul class="account">
                <li class="row">
                    <div class="col-md-3"><h4>E-Mail</h4></div>
                    <div class="col-md-9"><span>{{$com['email']}}</span></div>
                </li>
                <li class="row">
                    <div class="col-md-3"><h4>Phone</h4></div>
                    <div class="col-md-9"><span id="phone-com">{{$com['phone']}}</span></div>
                </li>
                <li class="row">
                    <div class="col-md-4 col-sm-5"><h4>Profile rate</h4></div>
                    <div class="col-md-6 col-sm-7">
                        <div class="progress">
                            <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
                                100%
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
            <form method="post" class="visible-data">
                <ul class="account">
                    <li class="row">
                        <div class="col-md-3 col-xs-4"><h4>Profile Visibility</h4></div>
                        <div class="col-md-4 col-xs-8">
                            <select class="form-control" name="show" id="com-show">
                                <option selected hidden>{{$com['show']}}</option>
                                <option>Active</option>
                                <option>Privet</option>
                            </select>
                        </div>
                    </li>
                    <li class="row">
                        <button id="save-com-show" class="btn btn-publish">Save Changes</button>
                        <a type="button" class="btn btn-publish" href="/company/delete">Delete Account</a>
                        <div class="alert-success col-md-3 col-xs-4"></div>
                    </li>
                </ul>
                {{csrf_field()}}
            </form>
        </div>
        <div class="category">
            <h4>Categories</h4>
            <button class="btn btn-edit-img" data-toggle="modal" data-target="#edit-com">
                <i class="fa fa-pencil" aria-hidden="true"></i>
            </button>
            <hr>
            <h5 id="field">{{$com['field']}}</h5>
        </div>
        @include('company.setting.category')
        <div class="linked-account">
            <h4>Linked Account</h4>
            <hr>
            <div class="row clearfix">
                <div class="col-md-4 col-xs-6">
                    <button class="btn btn-social">
                        <i class="fa fa-facebook-square" aria-hidden="true"></i>
                        <span>Facebook</span>
                    </button>
                </div>
                <div class="col-md-4 col-xs-6">
                    <button class="btn btn-social">
                        <i class="fa fa-twitter-square" aria-hidden="true"></i>
                        <span>Twitter</span>
                    </button>
                </div>
                <div class="col-md-4 col-xs-6">
                    <button class="btn btn-social">
                        <i class="fa fa-linkedin-square" aria-hidden="true"></i>
                        <span>Linkedin</span>
                    </button>
                </div>
                <div class="col-md-4 col-xs-6">
                    <button class="btn btn-social">
                        <i class="fa fa-github-square" aria-hidden="true"></i>
                        <span>Github</span>
                    </button>
                </div>
                <div class="col-md-4 col-xs-6">
                    <button class="btn btn-social">
                        <i class="fa fa-stack-overflow" aria-hidden="true"></i>
                        <span>Stack-overflow</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{URL::asset('script/phone.js')}}"></script>
<script src="{{URL::asset('script/setting.js')}}"></script>