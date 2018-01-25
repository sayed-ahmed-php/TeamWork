<link href="{{URL::asset('src/css/setting.css')}}" rel="stylesheet">
<script type="@php($all = \App\Models\Team::where('leader', Auth::guard('company') -> user() -> id) -> get())"></script>
<div class="col-sm-8 col-xs-12">
    <h1>My Team</h1>
    <div class="my-team">
        <!--						   <h4>you currently have no team</h4>-->
        <h4> Add Member</h4>
        <button class="btn btn-add-team" data-toggle="modal" data-target="#add-team">
            <span class="fa fa-plus-circle" aria-hidden="true"></span>
        </button>

        <button class="btn btn-primary btn-create-team" data-toggle="modal" data-target="#Create-team"> Create Team</button>
        <hr>
        <!--						   Modal-->
        <div class="modal fade" id="add-team" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="exampleModalLabel">add team member </h3>
                    </div>
                    <div class="modal-body">
                        @if(!empty($contact))
                            @foreach($contact as $contact)
                                @if($contact -> user -> state == 'free')
                                    <ul class="member-list">
                                        <li>
                                            @if(empty($contact -> user -> image))
                                                <a><img src="{{URL::asset('src/images/user.png')}}" class="img-responsive" alt="team"></a>
                                            @else
                                                <a><img src="{{URL::asset($contact -> user -> image)}}" class="img-responsive" alt="team"></a>
                                            @endif
                                        </li>
                                        <li> <a href="#">{{$contact -> user -> fname.' '.$contact -> user -> lname}}</a></li><br>
                                        <li> <a href="#">{{$contact -> user -> field.' - '.$contact -> user -> skill}}</a></li><br>
                                        @if(!empty($all))
                                            <li id="select">
                                                <select class="form-control select">
                                                    @foreach($all as $all)
                                                        {{$t = 'false'}}
                                                        @foreach($all -> user as $check)
                                                            @if($check['user_id'] == $contact -> user -> id)
                                                                {{$t = 'true'}}
                                                            @endif
                                                        @endforeach
                                                        @if($t == 'false')
                                                            <option>{{$all['name']}}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </li>
                                        @endif
                                        <li> <a href="#" class="btn btn-primary add-team" data-id="{{$contact -> user -> id}}">ADD</a></li>
                                    </ul>
                                    <hr>
                                @endif
                            @endforeach
                        @endif
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!--						   modal create team-->
        <div class="modal fade" id="Create-team" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="exampleModalLabel">Create Team work </h3>
                    </div>
                    <div class="modal-body">
                        <form class="form-group" method="post">
                            <input type="text" class="form-control name" placeholder="Type your team name" name="name" required>
                            <span class="msg"></span>
                            <script type="text/javascript">
                                $('.name').on('focusout', function (e) {
                                    e.preventDefault();

                                    $.ajax({
                                        type : 'get',
                                        url : '/company/check-team',
                                        data : {name : $('.name').val()},
                                        success : function (data) {
                                            if (data === 'true'){
                                                $('.msg').html('New Name.').css('color', 'green');
                                            }else {$('.msg').html('Name is found.').css('color', 'red');}
                                        }
                                    });
                                });
                            </script>
                            {{csrf_field()}}
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary create">Create</button>
                        <button type="button" class="btn btn-secondary closed" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <h5 class="append"></h5>
        @if(!empty($leader))
            @foreach($leader as $leader)
                <div class="row">
                    <script type="@php($user = $leader -> user() -> get())"></script>
                    <h5>{{$leader['name']}}</h5>
                    @if(!empty($user))
                        @foreach($user as $user)
                            <div class="col-sm-6">
                                <div class="team-member">
                                    <div class="row">
                                        <div class="col-lg-5 col-xs-6 ">
                                            <div class="team-img">
                                                @if(empty($user -> user -> image))
                                                    <img src="{{URL::asset('src/images/user.png')}}" class="img-responsive" alt="team">
                                                @else
                                                    <img src="{{URL::asset($user -> user -> image)}}" class="img-responsive" alt="team">
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-7 col-xs-6">
                                            <div class="teamMember-info">
                                                <label></label>
                                                <span>{{$user -> user -> fname.' '.$user -> user -> fname}}</span>
                                                <span>{{$user -> user -> field.' - '.$user -> user -> skill}}</span>
                                                <a href="/user/user-profile/{{$user -> user -> id}}" >view profile</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <span>The Team is empty.</span>
                    @endif
                </div>
                <br><hr>
            @endforeach
        @endif
        </div>
    </div>
<script type="text/javascript">
    $('.create').on('click', function (e) {
        e.preventDefault();

        if ($('.name').val()){
            $.ajax({
                type : 'get',
                url : '/company/add-team',
                data : {name : $('.name').val()},
                success : function (data) {
                    if (data === 'true'){
                        $('.append').append($('.name').val()+' - Leader');
                        $('.closed').trigger('click');
                    }
                }
            });
        }else {$('.msg').html('Required!!').css('color', 'red')}
    })
</script>
<script type="text/javascript">
    $('.add-team').on('click', function (e) {
        e.preventDefault();
        let id = e.target.dataset['id'];
        let value = $('.select').val();

        if (value){
            $.ajax({
                type : 'get',
                url : '/company/add-member',
                data : {name : value, id : id},
                success : function () {
                    $('.select option:selected').remove();
                }
            });
        }
    })
</script>
